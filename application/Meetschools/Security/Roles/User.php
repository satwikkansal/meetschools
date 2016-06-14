<?php

namespace Meetschools\Security\Roles;

use Meetschools\Models\User as UserModel;
use Meetschools\Security\Resource_Permission;

/*this can be used to handle users who just use alert*/
class User extends Domain_Role {

    private $user;
    private $resource_permission;

    public function __construct(UserModel $user) {
        $this->user = $user;
        $this->resource_permission = $this->create_resource_permission();
    }

    public function is_of_type($type) {
        return $type == 'user' || $type == 'guest';
    }

    public function user() {
        return $this->user;
    }

    private function create_resource_permission() {
        $internshala_resource = new Resource_Permission('internshala', TRUE);
        $internshala_resource->add_sub_resource(Resource_Permission::create_resource_permission_with_crud('alert'));
        return $internshala_resource;
    }

    public  function resource_permission() {
        return $this->resource_permission;
    }

    public function name() {
        return 'User';
    }

    public function main_role() {
        return 'user';
    }
}

/* End of file User.php */
/* Location: ./application/Meetschools/Security/Roles/User.php */
