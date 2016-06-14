<?php

namespace Meetschools\Security;

use Meetschools\Helpers\Utils;

class Resource_Permission {
    
    public static $CREATE = 1;
    public static $READ = 2;
    public static $UPDATE = 4;
    public static $DELETE = 8;
    
    private $sub_resources = array();
    private $has_permission;
    private $name;

    public function __construct($name, $default_permission=FALSE) {
        $this->name = $name;
        $this->has_permission = $default_permission;
    }

    public function add_sub_resource(Resource_Permission $resource) {
        $this->sub_resources[$resource->name] = $resource;
    }

    public function setPermssion($b, $cascade = FALSE) {
        $this->has_permission = $b;
        if(!$cascade) {
            return;
        }
        foreach ($this->sub_resources as $name => $resource) {
            $resource->setPermssion($b, $cascade);
        }
    }

    public function has_permission($sub_resource_path) {
        if(!$this->has_permission) {
            return FALSE;
        }
        if(Utils::is_null_or_empty($sub_resource_path)) {
            return TRUE;
        }
        $tokens = explode('.', $sub_resource_path, 2);
        $sub_resource_name = $tokens[0];
        $sub_resource = Utils::array_value($sub_resource_name, $this->sub_resources);
        if(!isset($sub_resource)) {
            return false;
        }
        return $sub_resource->has_permission(count($tokens) == 2 ? $tokens[1] : null);
    }

    public static function create_from_array(array $raw_resource) {
        $resource = new Resource_Permission($raw_resource['name'], $raw_resource['has_permission']);
        $sub_resources = Utils::array_value('sub_resources', $raw_resource);
        if (!isset($sub_resources)) {
            return $resource;
        }
        foreach($sub_resources as $name => $sub_resource) {
            $resource->add_sub_resource(self::create_from_array($sub_resource));
        }
        return $resource;
    }

    public static function create_resource_permission_with_crud($resource_name, $flag = 15) {
        $resource = array(
            'name' => $resource_name,
            'sub_resources' => array(
                array('name' => 'create', 'has_permission' => ($flag & self::$CREATE) != 0),
                array('name' => 'view', 'has_permission' => ($flag & self::$READ)  != 0),
                array('name' => 'modify', 'has_permission' => ($flag & self::$UPDATE)  != 0),
                array('name' => 'delete', 'has_permission' => ($flag & self::$DELETE)  != 0),
            ),
            'has_permission' => TRUE
        );
        return self::create_from_array($resource);
    }
}

/* End of file Resource_Permission.php */
/* Location: ./application/Meetschools/Security/Resource_Permission.php */
