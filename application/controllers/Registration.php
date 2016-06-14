<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Workshop\Models\User;
use Doctrine\ORM\EntityManager;

/**
 * @role(value={"guest"})
 * @method({"get"})
 */
class Registration extends MY_Controller {

    public function index() {
        $data = new stdClass();
        $this->view_with_template('registration', array('data' => $data));
    }

}
