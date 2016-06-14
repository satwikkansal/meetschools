<?php

namespace Meetschools\Security;

use Meetschools\Security\Roles\Domain_Role;

class Security_Context {

    private $domain_role;

    public function __construct(Domain_Role $domain_role) {
        $this->domain_role = $domain_role;
    }

    public function role() {
        return $this->domain_role;
    }

    public function has_permission($resource_path) {
        return $this->domain_role->has_permission($resource_path);
    }
}

/* End of file Security_Context.php */
/* Location: ./application/Meetschools/Security/Security_Context.php */