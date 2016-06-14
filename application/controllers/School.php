<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Doctrine\ORM\EntityManager;

use Meetschools\Helpers\Utils;
use Meetschools\Helpers\Reference_Data;
use Meetschools\Helpers\School_Helper;
use Meetschools\Helpers\Search\Search_Query_Builder;

/**
 * @resource("school")
 */
class School extends MY_Controller {

    /**
     * @method({"get"})
     * @role({"guest"})
     * @resource(".view")
     */
    public function detail($url = NULL) {
        $em = $this->em;
        $data = new stdClass();

        $school_helper = new School_Helper();
        $school = $school_helper->find_school_to_view($url, $data, $em);
        if ($school === NULL) {
            $this->view_with_template('detail', array('data' => $data));
            return;
        }
        $data->school = $school;

        $this->view_with_template('detail', array('data' => $data));
    }


    /**
     * @method({"get"})
     * @role({"guest"})
     * @resource(".view")
     */    
    public function search() {
        $em = $this->em;
        $query = $this->query(func_get_args(), FALSE, TRUE);
        $data = $query->search($em);
        $this->view_with_template('school/search/search', $data);
    }
    
    /**
     * @method({"get"})
     * @role({"guest"})
     * @resource(".view")
     */    
    public function search_api() {
        $em = $this->em;
        $query = $this->query(func_get_args(), FALSE, TRUE);
        $data = $query->search($em);
        $this->view_with_template('json_response', $data);
    }

    private function query($args, $read_from_cookie, $set_to_cookie) {
        $em = $this->em;
        $args = $this->security->xss_clean($args);
        $args = $this->read_or_set_query_from_cookie($args, $read_from_cookie, $set_to_cookie);
        Reference_Data::create($em);
        $query_builder = new Search_Query_Builder($em);
        $query_builder->parse_query_segments($args);
        return $query_builder->query();
    }

    private function read_or_set_query_from_cookie($args, $read_from_cookie, $set_to_cookie) {
        $this->load->helper('cookie');
        if (count($args) == 0 && $read_from_cookie) {
            $cookie_value = get_cookie('q');
            if ($cookie_value === FALSE) {
                return $args;
            }
            return explode('/', $cookie_value);
        }

        if ($set_to_cookie) {
            set_cookie('q', implode('/', $args), 315360000, '', '/school/search'); //set it for 10 years
        }
        return $args;
    }
    
    /**
     * @method({"get"})
     * @role({"guest"})
     * @resource(".view")
     */    
    public function add() {
        $this->view_with_template('school/add');
    }

}
