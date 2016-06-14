<?php

namespace Meetschools\Security\Roles;

use Meetschools\Models\User as UserModel;

class Admin extends User {
    
    public function __construct(UserModel $user) {
        parent::__construct($user);
    }
    
    public function is_of_type($type) {
        if (parent::is_of_type($type)) {
            return TRUE;
        }
        return $type == 'admin';
    }

    public function has_permission($resource_path) {
        return TRUE;
    }

    public function name() {
        return 'Administrator';
    }

    public function main_role() {
        return 'admin';
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

/* End of file Admin.php */
/* Location: ./application/Meetschools/Security/System.php */