<?php

namespace Meetschools\Security;

interface ISession {

    public function security_context();
    public function role();
    public function reset();
    
}
/* End of file ISession.php */
/* Location: ./application/models/Meetschools/Security/ISession.php */