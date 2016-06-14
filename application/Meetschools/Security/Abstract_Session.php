<?php

namespace Meetschools\Security;

abstract class Abstract_Session implements ISession {

    private $security_context;
    
    public function security_context() {
        if(!isset($this->security_context)) {
            $ci = & get_instance();
            $em = $ci->doctrine->em;
            $security_context = $this->create_security_context($ci, $em);
            $this->security_context = $security_context;
            $em->flush();
        }
        return $this->security_context;
    }
    
    protected abstract function create_security_context($ci, $em);

    public function reset(Security_Context $security_context = NULL) {
        unset($this->security_context);
        if($security_context != NULL) {
            $this->security_context = $security_context;
        }
    }
    
    public function role() {
        return $this->security_context()->role();
    }
    
}

/* End of file Abstract_Session.php */
/* Location: ./application/models/Meetschools/Security/Abstract_Session.php */