<?php

namespace Meetschools\Security\Roles;


class Guest extends Domain_Role {

    public function is_of_type($type) {
        return $type == 'guest';
    }

    protected function resource_permission() {
        return new Resource_Permission();
    }

    public function name() {
        return 'Guest';
    }

    public function main_role() {
        return 'guest';
    }
}

/* End of file Guest.php */
/* Location: ./application/Meetschools/Security/Roles/Guest.php */
