<?php

namespace Meetschools\Security\Roles;

use Meetschools\Models\Student as StudentModel;
use Meetschools\Security\Resource_Permission;

class Student extends User {

    private $student;

    public function __construct(StudentModel $student) {
        parent::__construct($student->user());
        $this->student = $student;
        $this->add_resource_permission();
    }

    public function student() {
        return $this->student;
    }

    public function is_of_type($type) {
        if(parent::is_of_type($type)) {
            return TRUE;
        }
        return $type == 'student';
    }

    /*this will assign appropriate permission to all resources*/
    private function add_resource_permission() {
        $resource_permission = parent::resource_permission();
        $resource_permission->add_sub_resource(Resource_Permission::create_resource_permission_with_crud('internship'));
        $resource_permission->add_sub_resource(Resource_Permission::create_resource_permission_with_crud('dashboard'));
        $resource_permission->add_sub_resource(Resource_Permission::create_resource_permission_with_crud('application', Resource_Permission::$CREATE));
        $resource_permission->add_sub_resource(Resource_Permission::create_resource_permission_with_crud('resume', Resource_Permission::$READ));
    }

    public function name() {
        return $this->student->first_name();
    }

    public function main_role() {
        return 'student';
    }
}

/* End of file Student.php */
/* Location: ./application/Meetschools/Security/Roles/Student.php */
