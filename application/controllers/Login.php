<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Meetschools\Models\User;
use Doctrine\ORM\EntityManager;
use Meetschools\Helpers\Password_Helper;
use Meetschools\Annotations\Method;
use Meetschools\Annotations\Resource;
use Meetschools\Annotations\Role;
use Meetschools\Security\Security_Manager;
use Meetschools\Helpers\Student_Builder;
use Meetschools\Helpers\User_Builder;

/**
 * @role(value={"guest"}, on_fail="dashboard", strict=true)
 * @method({"post"})
 */
class Login extends MY_Controller {
    
    private $user_id_session_key = 'user_id';
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    /**
     * @method({"get"})
     */
    public function index() {
        $data = new stdClass();
        $this->view_with_template('login/login', array('data' => $data));
    }
    
    /**
     * @method({"get"})
     */
    public function generate_password($readable) {
        echo strtoupper('*' . sha1(sha1($readable, TRUE), FALSE));
    }
    
    
    
    
    
    /**
     * @method({"get", "post"})
     */
    public function verify_ajax($role = NULL, $success_page = 'dashboard', $referer = NULL) {
        $data = new stdClass();

//        $validation_functions = new Validation_Functions();
//        $validation_functions->validate_login_form();
//        if ($validation_functions->has_errors()) {
//            $data->success = FALSE;
//            $data->errorThrown = array("validationError" => $validation_functions->errors());
//            $this->view_with_template('json_response', array('data' => $data));
//            return;
//        }

        $error = NULL;
        $user = $this->do_login($role, $error);
        if ($user === NULL) {
            $this->send_login_response(FALSE, NULL, $error, NULL);
            return;
        }

        global $session;
        $role = $session->role();
        if ($success_page === 'dashboard') {
            $success_page = $role->dashboard_url();
        }

        $this->send_login_response(TRUE, $success_page, NULL, $role);
    }
    
    private function do_login($role, & $error) {
        $em = $this->em;
        $security_manager = Security_Manager::instance();
        $response = $security_manager->login($role, $this, $em);
        $em->flush();
        if (!$response->success) {
            $error = $response->error;
            return NULL;
        }
        return $response->user;
    }
    
    private function send_login_response($valid, $success_page, $error_thrown, $role) {
        $data = new stdClass();
        $data->success = $valid;
        $data->successPage = $success_page;
        $data->errorThrown = $error_thrown;
        if (isset($role)) {
            $data->name = $role->name();
            $data->role = $role->main_role();
        }
        $this->view_with_template('json_response', array('data' => $data));
    }

}
