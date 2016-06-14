<?php

namespace Meetschools\Security;

use Meetschools\Security\Roles\Domain_Role;

interface Owned {
    
    public function can_create(Domain_Role $role);
    
    public function can_read(Domain_Role $role);
    
    public function can_update(Domain_Role $role);
    
    public function can_delete(Domain_Role $role);
    
    public function is_owned_by(Domain_Role $role);
}

/* End of file Owned.php */
/* Location: ./application/models/Meetschools/Security/Owned.php */