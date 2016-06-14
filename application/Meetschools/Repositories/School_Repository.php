<?php

namespace Meetschools\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Meetschools\Helpers\SQL\Comparer_Criteria;
use Meetschools\Helpers\Search\School_Meta;
use Meetschools\Helpers\Search\Search_Query;
use Meetschools\Helpers\Search\Schools_Meta;
use Meetschools\Helpers\Utils;
use Meetschools\Helpers\SQL\Conditional_Expression;
use Meetschools\Helpers\SQL\JQGrid_Filters;
use Meetschools\Helpers\SQL\Join_Statements;
use Meetschools\Helpers\SQL\Is_Null_Criteria;
use Meetschools\Helpers\SQL\Is_Not_Null_Criteria;
use Meetschools\Helpers\SQL\In_Criteria;

class School_Repository extends EntityRepository {

    private $sort_map = array(
        'id' => 's.id',
    );
    private $search_map = array(
    );
    private $join_map = array(
    );
    
    public function schools_meta_for(Search_Query $query, $is_closed) {
        $em = $this->_em;

        $where_clause_expression = $query->where_clause_expression();
        
        $order_by_clause = $query->order_by_clause();

        $q = 'select distinct partial s.{id, url, name}, partial zone.{id, name}, partial city.{id, name}, partial district.{id, name}, partial state.{id, name} FROM Meetschools\Models\School s LEFT JOIN s.zone zone LEFT JOIN s.city city LEFT JOIN s.district district LEFT JOIN s.state state';

        list($initial_where_clause, $initial_params) = $where_clause_expression->sql_and_params(TRUE, TRUE);
        $initial_query = $em->createQuery($q . ' ' . $initial_where_clause . ' ' . $order_by_clause);
        
        
        $initial_query->setParameters($initial_params);
        $offset = ($query->page_number() - 1) * $query->page_size();
        if ($offset >= 0) {
            $initial_query->setFirstResult($offset);
        }
        $initial_query->setMaxResults($query->page_size() + 1);

        $initial_results = $initial_query->getArrayResult();
        

        $schools_meta = new Schools_Meta();
        foreach ($initial_results as $initial_result) {
           // $em->detach($initial_result);
            $schools_meta->add(new School_Meta($initial_result));
        }

        return $schools_meta;
    }
    
    private function __paginated_internships($employer, $offset, $limit, $sort_index, $sort_direction, $filters) {
        $ret = array();

        $join_statements = new Join_Statements($this->join_map);
        //$join_statements->add('applications');

        $and_expression = new Conditional_Expression(Conditional_Expression::$AND);
        if ($employer !== NULL) {
            $and_expression->add(new Comparer_Criteria('i.posted_by', $employer->user()->id(), Comparer_Criteria::$EQ));
        } else {
            $or_expression_admin_draft = new Conditional_Expression(Conditional_Expression::$OR);
            $or_expression_admin_draft->add(new Comparer_Criteria('i.status', "draft", Comparer_Criteria::$NE));
            $or_expression_admin_draft->add(new Comparer_Criteria('i.posted_by', '1', Comparer_Criteria::$EQ));
            $and_expression->add($or_expression_admin_draft);
        }
        $or_expression = new Conditional_Expression(Conditional_Expression::$OR);
        $or_expression->add(new Is_Null_Criteria('i.status'));
        $or_expression->add(new Comparer_Criteria('i.status', 'inactive', Comparer_Criteria::$NE));
        $and_expression->add($or_expression);

        $jqgrid_search = new JQGrid_Filters($this->search_map);
        $jqgrid_search->apply($filters, $and_expression, $join_statements);

        $count = $ret['count'] = $this->__pagination_count($and_expression, $join_statements);

        if ($count == 0) {
            return $ret;
        }

        if ($sort_index === 'count') {
            $ret['records'] = $this->__paginated_internships_order_by_applications($offset, $limit, $sort_direction, $and_expression, $join_statements);
            return $ret;
        }

        //$join_statements->add('company');

        $result_sorter = new Result_Sorter($this->sort_map);
        $order_by_clause = '';
        $result_sorter->append_order_by_clause($order_by_clause, $sort_index, $sort_direction, $join_statements);

        list($q, $params) = $and_expression->sql_and_params(TRUE, TRUE);

        $query = 'SELECT i FROM Internshala\Models\Internship i';
        $query .= ' ' . $join_statements->dql_statement();
        $query .= ' ' . $q;
        $query .= ' ' . $order_by_clause;

        $query = $this->_em->createQuery($query);
        $query->setParameters($params);

        if ($offset >= 0) {
            $query->setFirstResult($offset);
        }
        if ($limit > -1) {
            $query->setMaxResults($limit);
        }

        $ret['records'] = $query->getResult();
        return $ret;
    }

    private function __pagination_count($where_clause, $join_statements) {
        list($q, $params) = $where_clause->sql_and_params(TRUE, TRUE);

        $query = 'SELECT count(i.id) AS num FROM Internshala\Models\Internship i';
        $query .= ' ' . $join_statements->dql_statement();
        $query .= ' ' . $q;

        $query = $this->_em->createQuery($query);
        $query->setParameters($params);
        return intval($query->getSingleScalarResult());
    }

    private function __paginated_internships_order_by_applications($offset, $limit, $sort_direction, $where_clause, $join_statements) {
        $desired_ids = $this->get_desired_ids($offset, $limit, $sort_direction, $where_clause, $join_statements);

        $in_criteria = new In_Criteria('i.id', $desired_ids);
        list($in_expr, $parameters) = $in_criteria->sql_and_params(TRUE, TRUE);

        $q = 'SELECT i FROM Internshala\Models\Internship i ' . $in_expr;
        $query = $this->_em->createQuery($q);
        $query->setParameters($parameters);
        $internships = $query->getResult();

        $sorter = function($a, $b) use($sort_direction) {
            $application_count = function($internship) {
                $applications = $internship->applications();
                $count = 0;
                foreach ($applications as $application) {
                    if ($application->status() != "inactive") {
                        $count++;
                    }
                }
                return $count;
            };
            if ($a == $b) {
                return 0;
            }
            $counta = $application_count($a);
            $countb = $application_count($b);
            if ($counta == $countb) {
                return 0;
            }
            $multiplier = $sort_direction == 'ASC' ? 1 : -1;
            return ($counta < $countb) ? -1 * $multiplier : 1 * $multiplier;
        };
        usort($internships, $sorter);
        return $internships;
    }
    
    private function get_desired_ids($offset, $limit, $sort_direction, $where_clause, $join_statements) {
        list($q, $params) = $where_clause->sql_and_params(TRUE, FALSE);

        $query = 'SELECT i.id as id FROM internships i';
        $query .= ' ' . $join_statements->sql_statement();
        $query .= ' ' . $q;
        $query .= ' GROUP BY id ORDER BY count(*) ' . $sort_direction;

        $toks = array();
        if ($offset >= 0) {
            $toks[] = $offset;
        }
        if ($limit > -1) {
            $toks[] = $limit;
        }
        if (count($toks) > 0) {
            $q .= ' LIMIT ' . implode(', ', $toks);
        }
        $rsm = new ResultSetMapping;
        $rsm->addScalarResult('id', 'id');
        $query = $this->_em->createNativeQuery($query, $rsm);
        $query->setParameters($params);

        $desired_ids = array();
        $rs = $query->getResult();
        foreach ($rs as $result) {
            $desired_ids[] = $result['id'];
        }
        return $desired_ids;
    }
    
    private function serialize_array($array) {
        $newarray = array();
        foreach ($array as $innerarray) {
            $newarray[] = $innerarray['name'];
        }
        return $newarray;
    }
    
    public function get_cities_for_search_criteria(Search_Query $search_query = NULL, $is_closed = FALSE) {
        $em = $this->_em;

        if ($search_query) {
            $where_clause_expression_for_search = $search_query->where_clause_expression_for_categories();
        } else {
            $where_clause_expression_for_search = new Conditional_Expression(Conditional_Expression::$AND);
        }
        if (!$is_closed) {
            self::add_active_internship_expression($where_clause_expression_for_search, 'i.');
        } else {
            self::add_closed_internship_expression($where_clause_expression_for_search, 'i.');
        }

        $q = "select distinct l.name from Internshala\Models\City l LEFT JOIN l.internship_locations il LEFT JOIN il.internship i LEFT JOIN i.internship_categories ic";
        $order_by_clause = "order by l.name";

        list($where_clause, $params) = $where_clause_expression_for_search->sql_and_params(TRUE, TRUE);
        $query = $em->createQuery($q . ' ' . $where_clause . $order_by_clause);
        $query->setParameters($params);
        $result = $query->getArrayResult();

        $cities_for_search_criteria = $this->serialize_array($result);
        return $cities_for_search_criteria;
    }

}
