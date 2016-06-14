<?php

namespace Meetschools\Security\Roles;

use Meetschools\Security\Owned;

abstract class Domain_Role {

    public abstract function is_of_type($type);

    protected function resource_permission() {
        throw new \BadMethodCallException('This method must be declared.');
    }

    public function has_permission($resource_path) {
        return $this->resource_permission()->has_permission($resource_path);
    }

    public abstract function name();

    public abstract function main_role();
    
    public function is_main_role($role) {
        return $role === $this->main_role();
    }
    
    public function dashboard_url() {
        return '/' . $this->main_role() . '/dashboard';
    }
    
    public function can_create($o) {
        if($o instanceof Owned) {
            return $o->can_create($this);
        }
        return TRUE;
    }
    
    public function can_read($o) {
        if ($o instanceof Owned) {
            return $o->can_read($this);
        }
        return TRUE;
    }
    
    public function can_update($o) {
        if ($o instanceof Owned) {
            return $o->can_update($this);
        }
        return TRUE;
    }
    
    public function can_delete($o) {
        if ($o instanceof Owned) {
            return $o->can_delete($this);
        }
        return TRUE;
    }
    
    public function owns($o) {
        if ($o instanceof Owned) {
            return $o->is_owned_by($this);
        }
        return TRUE;
    }
}

/* End of file Domain_Role.php */
/* Location: ./application/Meetschools/Security/Domain_Role.php */