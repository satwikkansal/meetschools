<?php

namespace Meetschools\Security;


class Session_Factory {
    
    private $is_cli;
    
    public function __construct($ci) {
        $this->is_cli = $ci->input->is_cli_request();
    }
    
    private function create_session() {
        if ($this->is_cli) {
            return new Cli_Session();
        }
        return new Session();
    }
    
    public function init_session() {
        $session = $this->create_session();
        $GLOBALS['session'] = $session;
        return $session;
    }
}
/* End of file Session_Factory.php */
/* Location: ./application/models/Meetschools/Security/Session_Factory.php */