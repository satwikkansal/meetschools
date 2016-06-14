<?php

namespace Meetschools\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Meetschools\Models\User;
use Meetschools\Helpers\Utils;
use Meetschools\Helpers\SQL\Conditional_Expression;
use Meetschools\Helpers\SQL\JQGrid_Filters;
use Meetschools\Helpers\SQL\Join_Statements;
use Meetschools\Helpers\SQL\Is_Null_Criteria;
use Meetschools\Helpers\SQL\In_Criteria;
use Meetschools\Helpers\SQL\Not_In_Criteria;

class Student_Repository extends EntityRepository {

    public function find_by_user_id($id) {
        $query = $this->_em->createQuery('SELECT s, u FROM Meetschools\Models\Student s JOIN s.user u WHERE u.id =?1 and u.status = \'active\'');
        $query->setParameter(1, $id);
        return $query->getOneOrNullResult();
    }

}

/* End of file Student_Repository.php */
/* Location: ./application/models/Meetschools/Repositories/Student_Repository.php */


