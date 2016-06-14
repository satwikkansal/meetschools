<?php

namespace Meetschools\Security;

use Meetschools\Security\Roles\System;

class Cli_Session extends Abstract_Session {

    public function reset(Security_Context $security_context = NULL) {
        //does nothing
    }

    protected function create_security_context($ci, $em) {
        return new Security_Context(new System());
    }
}
/* End of file Cli_Session.php */
/* Location: ./application/models/Meetschools/Security/Cli_Session.php */