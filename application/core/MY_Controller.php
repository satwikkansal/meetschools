<?php

use Doctrine\Common\Annotations\AnnotationReader;
use Meetschools\Helpers\Utils;
use Meetschools\Security\Session_Factory;
use Meetschools\Helpers\Email_Functions;

class MY_Controller extends CI_Controller {

    protected $em;

    function __construct() {
        parent::__construct();

        date_default_timezone_set('Asia/Calcutta');
        $this->load->library('doctrine');
        $this->em = $this->doctrine->em;
        $this->load->library('doctrine_extension');
        $this->doctrine_extension->init($this->em);

        $this->init_security_context();

        $refl_controller = new \ReflectionClass($this->router->class);
        try {
            $refl_action = $refl_controller->getMethod($this->router->method);
        } catch (\Exception $ex) {
            return;
        }

        Doctrine\Common\Annotations\AnnotationRegistry::registerFile(__DIR__ . '/../helpers/annotations.php');
        $reader = new AnnotationReader();
        $reader->setDefaultAnnotationNamespace('Meetschools\Annotations\\');
        $reader->setIgnoreNotImportedAnnotations(true);
        $reader->setEnableParsePhpImports(false);
        $reader = Utils::cached_annotations_reader($reader);

        $this->verify_request_method($reader, $refl_controller, $refl_action);

        $this->verify_access($reader, $refl_controller, $refl_action);

        $get_input = $this->input->get();
        if (isset($get_input['utm_source'])) {
            $_SESSION['utm_source'] = $get_input['utm_source'];
        }
        if (isset($get_input['utm_medium'])) {
            $_SESSION['utm_medium'] = $get_input['utm_medium'];
        }
        if (isset($get_input['utm_campaign'])) {
            $_SESSION['utm_campaign'] = $get_input['utm_campaign'];
        }
    }

    private function verify_request_method($reader, $refl_controller, $refl_action) {
        $method = $this->input->is_cli_request() ? 'cli' : strtolower($_SERVER['REQUEST_METHOD']);

        $action_allowed_methods = $reader->getMethodAnnotation($refl_action, 'Meetschools\Annotations\Method');
        if (isset($action_allowed_methods) && isset($action_allowed_methods->value)) {
            $allowed_methods = $action_allowed_methods->value;
        }

        $controller_allowed_methods = $reader->getClassAnnotation($refl_controller, 'Meetschools\Annotations\Method');
        if (!isset($allowed_methods) && isset($controller_allowed_methods)) {
            $allowed_methods = $controller_allowed_methods->value;
        }

        $allowed_methods[] = "head";
        
        if (!isset($allowed_methods) || !in_array($method, $allowed_methods)) {
            throw new Exception('Current request method is not allowed: ' . $method);
        }
    }

    private function init_security_context() {
        $session_factory = new Session_Factory($this);
        return $session_factory->init_session()->security_context();
    }

    private function verify_access($reader, $refl_controller, $refl_action) {
        global $session;

        if ($session->role()->is_of_type('system')) {
            return;
        }

        $role_property = $this->get_role_property($reader, $refl_controller, $refl_action);
        $this->verify_role($role_property);

        if (in_array('guest', $role_property->value)) {
            return;
        }

        $resource_path = $this->get_resource_path($reader, $refl_controller, $refl_action);
        $this->verify_resource($resource_path);
    }

    protected function verify_role($role_property) {
        global $session;
        $current_role = $session->role();

        $finder_method = $role_property->strict ? 'is_main_role' : 'is_of_type';

        $matched = FALSE;
        $allowed_roles = $role_property->value;
        foreach ($allowed_roles as $role) {
            if ($current_role->$finder_method($role)) {
                $matched = TRUE;
                break;
            }
        }

        if (!$matched) {
            $this->on_access_fail($role_property, $current_role);
            return FALSE;
        }
        return TRUE;
    }

    private function verify_resource($resource_path) {
        global $session;
        $security_context = $session->security_context();

        if (!$security_context->has_permission($resource_path)) {
            show_error('You do not have permission for this page.');
            return FALSE;
        }

        return TRUE;
    }

    private function on_access_fail($role_property, $current_role) {
        $on_fail = $role_property->on_fail;
        if (!$on_fail) {
            $on_fail = $current_role->is_main_role('guest') ? 'login' : '401';
        }
        $on_fail = 'access_fail_' . $on_fail;
        $this->$on_fail($role_property, $current_role);
    }

    private function access_fail_dashboard($role_property, $current_role) {
        header('Location: ' . $current_role->dashboard_url());
        exit;
    }

    private function access_fail_401($role_property, $current_role) {
        show_error('You do not have permission for this page.');
    }

    private function access_fail_login($role_property, $current_role) {
        $role = NULL;

        $allowed_roles = $role_property->value;

        if (count($allowed_roles) == 1) {
            $role = $allowed_roles[0];
        }

        $GLOBALS['CI'] = & get_instance(); //have to set global CI.

        $login_view = $this->input->is_ajax_request() ? 'json_response' : 'login/login';
        $data = new stdClass();
        $data->role = $role;
        $data->success = FALSE;
        $data->successPage = $this->determine_login_success_page($role_property);
        $data->referer = $this->determine_login_referer($role_property);
        $data->errorThrown = 'Require Login';
        $data->requireLogin = TRUE;

        $this->view_with_template($login_view, array('data' => $data));
        echo $this->output->get_output();
        exit;
    }

    private function determine_login_success_page($role_property) {
        $key = $role_property->login_success_page;
        if (Utils::is_null_or_empty($key)) {
            return $_SERVER['REQUEST_URI'];
        }
        $url = $this->determine_url($key);
        if (Utils::is_null_or_blank($url)) {
            throw new Exception('invalid success url found for key: ' . $key);
        }
        return $url;
    }

    private function determine_login_referer($role_property) {
        $key = $role_property->login_referer;
        if (Utils::is_null_or_empty($key)) {
            $this->load->helper('url');
            return Utils::valid_referer_path(base_url());
        }
        return $this->determine_url($key);
    }

    private function determine_url($key) {
        $this->load->helper('url');
        $parts = explode(':', $key, 2);
        $type = $parts[0];
        if ($type === 'url') {
            return $parts[1];
        }
        if ($type === 'seg') {
            $referer = $this->uri->rsegment(intval($parts[1]), FALSE);
            if ($referer !== FALSE) {
                return $referer;
            }
            return NULL;
        }
        if ($type === 'param') {
            $referer = $this->input->get_post($parts[1]);
            if ($referer !== FALSE) {
                return $referer;
            }
            return NULL;
        }
        throw new Exception('invalid referer attribute on @Role property: ' . $key);
    }

    private function get_role_property($reader, $refl_controller, $refl_action) {
        $role_property = $this->read_role_property($reader, $refl_controller, $refl_action);
        if (!$role_property || !$role_property->validate()) {
            throw new \Exception('Invalid @role provided for controller method/class.');
        }
        return $role_property;
    }

    private function read_role_property($reader, $refl_controller, $refl_action) {
        return $reader->getMethodAnnotation($refl_action, 'Meetschools\Annotations\Role') ? : $reader->getClassAnnotation($refl_controller, 'Meetschools\Annotations\Role');
    }

    private function get_resource_path($reader, $refl_controller, $refl_action) {
        $action_resource = $reader->getMethodAnnotation($refl_action, 'Meetschools\Annotations\Resource');

        if (!isset($action_resource) || !isset($action_resource->value)) {
            throw new \Exception('Null @resource provided for controller method.');
        }

        $path = $action_resource->value;
        if (strpos($path, '.') !== 0) {
            return $path;
        }

        $controller_resource = $reader->getClassAnnotation($refl_controller, 'Meetschools\Annotations\Resource');
        if (!isset($controller_resource) || !isset($controller_resource->value)) {
            throw new \Exception('Null @resource provided for controller class.');
        }

        return $controller_resource->value . $path;
    }

    public function view_with_template($view, array $data = array()) {
        $templateHelper = new \Meetschools\Helpers\Template();
        return $templateHelper->invoke_view($this, $view, $data);
    }

}
