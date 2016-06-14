<?php

namespace Meetschools\Security;

use Doctrine\ORM\EntityManager;
use Meetschools\Helpers\Utils;
use Meetschools\Security\Roles\Guest;
use Meetschools\Security\Roles\Student;
use Meetschools\Security\Roles\Admin;
use Meetschools\Security\Roles\User;
use Meetschools\Security\Roles\Valid_User;

class Security_Manager {

    private static $instance;
    private static $remember_me_cookie_name = 'l';
    private static $user_id_session_key = 'user_id';
    public static $suspend_all_owner_checks = FALSE;

    private function __construct() {
        $current_cookie_params = session_get_cookie_params();
        session_set_cookie_params($current_cookie_params['lifetime'],
            $current_cookie_params['path'],
            $current_cookie_params['domain'],
            $current_cookie_params['secure'],
            TRUE
        );
        session_start();
    }

    public static function instance() {
        $instance = self::$instance;
        if (!isset($instance)) {
            $instance = self::$instance = new Security_Manager();
        }
        return $instance;
    }

    public function get_security_context($ci, EntityManager $em) {
        $user = $this->find_current_user($ci, $em);
        if ($user !== NULL) {
            $user->set_last_seen_at(new \DateTime());
            if ($user->status() != 'active') {
                $this->clear_cookies_and_keys($em);
                $user = NULL;
            }
        }
        $security_context = $this->create_security_context($user, $em);
        return $security_context;
    }

    public function login_user($user, $role, $ci, EntityManager $em) {
        $response = new \stdClass();
        $response->success = FALSE;

	global $session;
        $session->reset();

        $security_context = $this->create_security_context($user, $em);
        if (!$security_context->role()->is_of_type($role)) {
            $response->error = "You are not a valid " . $role . ". Please <a href='/login/" . $user->type() . "'>click here</a> to go to " . $user->type() . " login page.";
            return $response;
        }

        $_SESSION[self::$user_id_session_key] = $user->id();
        $session->reset($security_context);

        $user->set_last_login_at(new \DateTime());
        $this->handle_remember_me($user, $ci, $em);
        $response->success = TRUE;
        $response->user = $user;
        return $response;
    }

    public function login($role, $ci, EntityManager $em) {
        $response = new \stdClass();
        $response->success = FALSE;

        global $session;
        $session->reset();

        $email = $ci->input->post('email');
        $password = $ci->input->post('password');

        $user = $em->getRepository('Meetschools\Models\User')->findOneByEmail($email);
        if ($user === NULL || $user->status() === 'unregistered') {
            $response->error = "This email id is not registered with Meetschools. To register, please click <a href='/registration/student/#container'>here</a> if you are a student or <a href='/registration/employer/#container'>here</a> if you an employer.";
            return $response;
        }

        $user = $em->getRepository('Meetschools\Models\User')->user_with_password($email, $password);
        if ($user === NULL) {
            $response->error = "The password does not match. Please use forgot password option if you do not remember your password.";
            return $response;
        }

        if ($user->status() === 'unconfirmed') {
            $response->error = "This email id is already registered but not yet verified. Please click on the verification link that we sent you in the email earlier, or <a href='/registration/request_activation/" . urlencode($user->email()) . "'>click here</a> to resend the activation link.";
            return $response;
        }

        $security_context = $this->create_security_context($user, $em);
        if (!$security_context->role()->is_of_type($role)) {
            $response->error = "You are not a valid " . $role . ". Please <a href='/login/" . $user->type() . "'>click here</a> to go to " . $user->type() . " login page.";
            return $response;
        }

        $_SESSION[self::$user_id_session_key] = $user->id();
        $session->reset($security_context);

        $user->set_last_login_at(new \DateTime());
        //$this->handle_remember_me($user, $ci, $em);
        $response->success = TRUE;
        $response->user = $user;
        return $response;
    }

    public function logout($ci, $em) {
        $ci->load->helper('cookie');
        $this->clear_cookies_and_keys($em);
        global $session;
        $session->reset();
    }

    private function find_current_user($ci, $em) {
        $user_id = Utils::array_value(self::$user_id_session_key, $_SESSION);
        if (!Utils::is_null_or_blank($user_id)) {
            $user = $em->getRepository('Meetschools\Models\User')->find($user_id);
            if ($user !== NULL) {
                return $user;
            }
            unset($_SESSION['user_id']);
            log_message('error', 'invalid user_id found on session. User Id: ' . $user_id);
        }
        return $this->find_user_from_login_cookie($ci, $em);
    }

    private function find_user_from_login_cookie($ci, $em) {
        $ci->load->helper('cookie');
        return;
       
    }

    //Not calling as of now. Might be valid ip change case too often.
    private function verify_remote_address($remember_me_token, $ci, $em) {
        if ($ci->input->ip_address() === $remember_me_token->remote_address()) {
            return;
        }
        delete_cookie(self::$remember_me_cookie_name);
        $this->handle_hijaking($remember_me_token, $em);
        show_error('Looks like you are accessing the site from different IP address. As a precaution we are closing all existing sessions.');
    }

    private function verify_if_session_hijaked($toks, $em) {
        $remember_me_token = $em->getRepository('Meetschools\Models\Remember_Me_Token')->findOneBy(array('persistant_key' => $toks[0]));
        if ($remember_me_token === NULL) {
            return;
        }

        $this->handle_hijaking($remember_me_token, $em);
        log_message('error', 'Detected session hijack for user ' . $remember_me_token->user->id());
        show_error('Looks like your session has been hijacked. We have taken precaution of closing all existing sessions. Go back and login again.');
    }

    private function handle_hijaking($remember_me_token, $em) {
        //Session has been hacked.
        //Delete all  login keys
        $query = $em->createQuery('DELETE Meetschools\Models\Remember_Me_Token l WHERE l.user = ?1');
        $query->setParameter(1, $remember_me_token->user());
        $query->getResult();
    }

    private function get_remember_me_cookie_tokens() {
        $cookie_value = get_cookie(self::$remember_me_cookie_name);
        if ($cookie_value === FALSE) {
            return NULL;
        }

        $toks = explode('/', $cookie_value);
        if (count($toks) != 2) {
            delete_cookie(self::$remember_me_cookie_name);
            return NULL;
        }
        return $toks;
    }

    private function delete_remember_me_token($em) {
        $toks = $this->get_remember_me_cookie_tokens();
        if ($toks === NULL) {
            return;
        }
        delete_cookie(self::$remember_me_cookie_name);

        $query = $em->createQuery('DELETE Meetschools\Models\Remember_Me_Token l WHERE l.persistant_key = ?1 AND l.token = ?2');
        $query->setParameter(1, $toks[0]);
        $query->setParameter(2, $toks[1]);
        $query->getResult();
    }

    private function create_or_update_key($user, $ci, $em) {
        $toks = $this->get_remember_me_cookie_tokens();
        $remember_me_token = NULL;
        if ($toks !== NULL) {
            $remember_me_token = $em->getRepository('Meetschools\Models\Remember_Me_Token')->findOneBy(array('persistant_key' => $toks[0], 'token' => $toks[1]));
        }
        if ($remember_me_token == NULL) {
            $remember_me_token = new Remember_Me_Token();
            $remember_me_token->set_user($user);
            $remember_me_token->set_persistant_key(Utils::guid());
            $remember_me_token->set_remote_address($ci->input->ip_address());
            $em->persist($remember_me_token);
        }
        $this->update_key($remember_me_token);
    }

    private function update_key($remember_me_token) {
        $new_token = Utils::guid();
        $remember_me_token->set_token($new_token);
        $cookie_value = $remember_me_token->persistant_key() . '/' . $new_token;
        setcookie(self::$remember_me_cookie_name, $cookie_value, time() + 315360000, '/', NULL, FALSE, TRUE); //save it for 10 years
    }

    private function handle_remember_me($user, $ci, $em) {
        /*$remember_me = $ci->input->post('remember-me') === 'y';
        $ci->load->helper('cookie');

        if(!$remember_me) {
            $this->delete_remember_me_token($em);
            return;
        }*/

        $this->create_or_update_key($user, $ci, $em);
    }

    private function clear_cookies_and_keys($em) {
        unset ($_SESSION[self::$user_id_session_key]);
        $this->delete_remember_me_token($em);
        $this->delete_sso_token($em);
    }

    protected function create_security_context($user, $em) {
        if ($user === NULL) {
            return $this->create_guest_security_context();
        }

        $type = $user->type();

        if ($type == 'student') {
            return $this->create_student_security_context($em, $user->id());
        }
        if ($type == 'employer') {
            return $this->create_employer_security_context($em, $user->id());
        }
        if ($type == 'admin') {
            return $this->create_admin_security_context($em, $user);
        }
        if ($type == 'user') {
            return $this->create_user_security_context($em, $user->id());
        }
        if ($type == 'tnp') {
            return $this->create_tnp_security_context($em, $user->id());
        }
        if ($type == 'training_partner') {
            return $this->create_training_partner_security_context($em, $user->id());
        }
    }

    private function create_student_security_context($em, $user_id) {
        $student = $em->getRepository('Meetschools\Models\Student')->find_by_user_id($user_id);
        if ($student === NULL) {
            return $this->create_guest_security_context();
        }
        return new Security_Context(new Student($student));
    }

    private function create_admin_security_context($em, $user) {
        return new Security_Context(new Admin($user));
    }

    private function create_user_security_context($em, $user) {
        return new Security_Context(new User($user));
    }

    private function create_guest_security_context() {
        return new Security_Context(new Guest());
    }

    public function get_or_generate_sso_token($ci, $em) {
        global $session;
        $role = $session->role();
        if (!$role->is_of_type('user')) {
            throw new \Exception('Can not create sso token for guest user.');
        }

        $sso_token = $em->getRepository('Meetschools\Models\Sso_Token')->findOneBy(array('session_id' => session_id()));
        if ($sso_token !== NULL) {
            return $sso_token->token();
        }

        $token = Utils::guid();
        $sso_token = new Sso_Token();
        $sso_token->set_token($token);
        $sso_token->set_session_id(session_id());
        $sso_token->set_remote_address($ci->input->ip_address());
        $sso_token->set_user($role->user());

        $em->persist($sso_token);

        return $token;
    }

    private function delete_sso_token($em) {
//        $query = $em->createQuery('DELETE Meetschools\Models\Sso_Token s WHERE s.session_id = ?1');
//        $query->setParameter(1, session_id());
//        $query->getResult();
    }

}

/* End of file Security_Manager.php */
/* Location: ./application/models/Meetschools/Security/Security_Manager.php */