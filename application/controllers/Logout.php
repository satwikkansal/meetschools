<?php

use Meetschools\Annotations\Method;
use Meetschools\Annotations\Resource;
use Meetschools\Annotations\Role;
use Meetschools\Security\Security_Manager;

/**
 * @method({"get","post"})
 * @role({"guest"})
 */
class Logout extends MY_Controller {

    public function index($referer = '/') {
        $em = $this->em;
        
        $security_manager = Security_Manager::instance();
        $security_manager->logout($this, $em);
        
        $em->flush();
        header('Location: ' . $referer);
    }
}

/* End of file logout.php */
/* Location: ./application/controllers/logout.php */
