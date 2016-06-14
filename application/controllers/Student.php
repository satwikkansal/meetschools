<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Workshop\Models\User;
use Doctrine\ORM\EntityManager;
use Meetschools\Helpers\Email_Functions;

/**
 * @method({"post"})
 * @role({"student"})
 * @resource("dashboard")
 */
class Student extends MY_Controller {

    /**
     * @method({"get"})
     * @resource(".view")
     */
    public function dashboard() {
        $data = new stdClass();
        $this->view_with_template('student/dashboard', array('data' => $data));
    }
    
    /**
     * @method({"get"})
     * @resource(".view")
     */
    public function my_teachers() {
        $data = new stdClass();
        $this->view_with_template('student/my_teachers', array('data' => $data));
    }
    
    /**
     * @method({"get"})
     * @resource(".view")
     */
    public function my_classmates() {
        $data = new stdClass();
        $this->view_with_template('student/my_classmates', array('data' => $data));
    }
    
    /**
     * @method({"get"})
     * @resource(".view")
     */
    public function complaints() {
        $data = new stdClass();
        $this->view_with_template('student/complaints', array('data' => $data));
    }
    
    /**
     * @method({"get"})
     * @resource(".view")
     */
    public function suggestions() {
        $data = new stdClass();
        $this->view_with_template('student/suggestions', array('data' => $data));
    }
    
    /**
     * @method({"get"})
     * @resource(".view")
     */
    public function settings() {
        $data = new stdClass();
        $this->view_with_template('student/settings', array('data' => $data));
    }

    /**
     * @method({"get"})
     * @resource(".view")
     */
    public function test() {
        $em = $this->em;
        $data = new stdClass();
        $email_functions = new Email_Functions($this, $em);
        $email_functions->send_mail_to_admin($em);
        echo "Done";
    }

}
