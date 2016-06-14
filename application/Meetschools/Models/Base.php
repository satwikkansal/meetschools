<?php

namespace Meetschools\Models;

/**
 * @mappedSuperclass
 * @HasLifecycleCallbacks
 */
class Base {
    public static $IGNORE = '_IGNORE_';

    protected static function explode($str, $converter=NULL, $glue = ',') {
        $ret = array();

        if(!isset($str)) {
            return $ret;
        }

        $array = explode($glue, $str);
        foreach ($array as $val) {
            if(isset($converter)) {
                $val = call_user_func($converter, $val);
            }
            if($val == Base::$IGNORE) {
                continue;
            }
            $ret[] = $val;
        }
        return $ret;
    }

    protected static function implode($array, $converter=NULL, $glue = ',', $nullable = TRUE) {
        if(!isset($array) || count($array) == 0) {
            return $nullable ? null : '';
        }

        $ret = '';

        $found = FALSE;
        foreach ($array as $val) {
            if(isset($converter)) {
                $val = call_user_func($converter, $val);
            }

            if ($val == Base::$IGNORE) {
                continue;
            }

            if($ret != '') {
                $ret .= $glue;
            }

            $ret .= strval($val);
        }
        return (!$found && $nullable) ? NULL : $ret;
    }

    public function __toString() {
        return $this->id();
    }
    
    public function & to_array() {
        $cache = array();
        return self::convert_to_array($this, $cache);
    }
    
    private static function cache_key(Base $obj) {
        return get_class($obj) . ':' . $obj->id();
    }
    
    private static function & find_in_cache(Base $obj, array &$cache) {
        $key = self::cache_key($obj);
        $cache_obj = & \Meetschools\Helpers\Utils::array_value($key, $cache);
        return $cache_obj;
    }
    
    private static function add_in_cache(Base $obj, array &$cache_obj, &$cache) {
        $key = self::cache_key($obj);
        $cache[$key] = & $cache_obj;
    }
    
    private static function & convert_to_array($obj, &$cache) {
        if($obj instanceof Base) {
            $array = & self::find_in_cache($obj, $cache);
            if($array !== NULL) {
                return $array;
            }
            $array = array();
            self::add_in_cache($obj, $array, $cache);
            $obj->convert_model_to_array($obj, $array, $cache);
            return $array;
        }
        
        if($obj instanceof \Doctrine\Common\Collections\Collection) {
            $obj = $obj->toArray();
        }
        
        if(!is_array($obj)) {
            return $obj;
        }
        $ret = array();
        foreach ($obj as $key => $value) {
            $ret[$key] = & self::convert_to_array($value, $cache);
        }
        return $ret;
    }
    
    private static function convert_model_to_array($obj, array &$array, array &$cache) {
        $reflection_class = new \ReflectionClass($obj);

        if ($obj instanceof \Doctrine\ORM\Proxy\Proxy) {
            $obj->__load();
            $reflection_class = $reflection_class->getParentClass();
        }

        foreach ($reflection_class->getProperties() as $property) {
            $name = $property->getName();
            if($name == 'created_at' || $name == 'last_updated_at') {
                continue;
            }
            if (!method_exists($obj, $name)) {
                continue;
            }
            $value = & self::convert_to_array($obj->$name(), $cache);
            $array[$name] = $value;
        }
    }
    
    /**
     * @PrePersist
     */
    public function on_pre_presist() {
        
        $date = new \DateTime();
        $this->created_at($date);
        $this->last_updated_at($date);
    }

    /**
     * @PreUpdate
     */
    public function on_pre_update() {
        
        $date = new \DateTime();
        $this->set_last_updated_at($date);
    }
    
    /**
     * @PreRemove
     */
    public function on_pre_remove() {
       
    }
    
  
   
}

