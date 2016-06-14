<?php

namespace Meetschools\Security;

class Session extends Abstract_Session {

    protected function create_security_context($ci, $em) {
        $security_manager = Security_Manager::instance();
        return $security_manager->get_security_context($ci, $em);
    }
}
/* End of file Session.php */
/* Location: ./application/models/Meetschools/Security/Session.php */