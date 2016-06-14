<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Workshop\Models\User;
use Doctrine\ORM\EntityManager;

/**
 * @role(value={"guest"})
 * @method({"get"})
 */
class Teacher extends MY_Controller {

    public function dashboard() {
        $data = new stdClass();
        $this->view_with_template('teacher/dashboard', array('data' => $data));
    }
    
    public function add_homework() {
        $data = new stdClass();
        $this->view_with_template('teacher/add_homework', array('data' => $data));
    }
    
    public function fellow_teachers() {
        $data = new stdClass();
        $this->view_with_template('teacher/fellow_teachers', array('data' => $data));
    }
    
    public function my_students() {
        $data = new stdClass();
        $this->view_with_template('teacher/my_students', array('data' => $data));
    }
    
    public function complaints() {
        $data = new stdClass();
        $this->view_with_template('teacher/complaints', array('data' => $data));
    }
    
    public function suggestions() {
        $data = new stdClass();
        $this->view_with_template('teacher/suggestions', array('data' => $data));
    }
    
    public function settings() {
        $data = new stdClass();
        $this->view_with_template('teacher/settings', array('data' => $data));
    }

}
