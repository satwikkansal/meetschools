<?php

namespace Meetschools\Security\Roles;

class System extends Domain_Role {

    public function is_of_type($type) {
        return TRUE;
    }

    public function has_permission($resource_path) {
        return TRUE;
    }

    public function name() {
        return 'System';
    }

    public function main_role() {
        return 'system';
    }
    
    public function can_create($o) {
        return TRUE;
    }

    public function can_read($o) {
        return TRUE;
    }

    public function can_update($o) {
        return TRUE;
    }

    public function can_delete($o) {
        return TRUE;
    }
    
    public function owns($o) {
        return TRUE;
    }
}

/* End of file System.php */
/* Location: ./application/Meetschools/Security/System.php */