<?php

namespace Meetschools\Proxies;

class MeetschoolsModelsSchoolProxy extends \Meetschools\Models\School implements \Doctrine\ORM\Proxy\Proxy {

    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;

    public function __construct($entityPersister, $identifier) {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }

    /** @private */
    public function __load() {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    public function id() {
        $this->__load();
        return parent::id();
    }

    public function code() {
        $this->__load();
        return parent::code();
    }

    public function set_code($code) {
        $this->__load();
        return parent::set_code($code);
    }

    public function url() {
        $this->__load();
        return parent::url();
    }

    public function set_url($url) {
        $this->__load();
        return parent::set_url($url);
    }

    public function name() {
        $this->__load();
        return parent::name();
    }

    public function set_name($name) {
        $this->__load();
        return parent::set_name($name);
    }

    public function views() {
        $this->__load();
        return parent::views();
    }

    public function set_views($views) {
        $this->__load();
        return parent::set_views($views);
    }

    public function set_zone(\Internshala\Models\Zone $zone) {
        $this->__load();
        return parent::set_zone($zone);
    }

    public function zone() {
        $this->__load();
        return parent::zone();
    }

    public function set_city(\Internshala\Models\City $city) {
        $this->__load();
        return parent::set_city($city);
    }

    public function city() {
        $this->__load();
        return parent::city();
    }

    public function set_district(\Internshala\Models\District $district) {
        $this->__load();
        return parent::set_district($district);
    }

    public function district() {
        $this->__load();
        return parent::district();
    }

    public function set_state(\Internshala\Models\State $state) {
        $this->__load();
        return parent::set_state($state);
    }

    public function state() {
        $this->__load();
        return parent::state();
    }

    public function set_created_at($created_at) {
        $this->__load();
        return parent::set_created_at($created_at);
    }

    public function created_at() {
        $this->__load();
        return parent::created_at();
    }

    public function set_last_updated_at($last_updated_at) {
        $this->__load();
        return parent::set_last_updated_at($last_updated_at);
    }

    public function last_updated_at() {
        $this->__load();
        return parent::last_updated_at();
    }

    public function __toString() {
        $this->__load();
        return parent::__toString();
    }

    public function &to_array() {
        $this->__load();
        return parent::to_array();
    }

    public function on_pre_presist() {
        $this->__load();
        return parent::on_pre_presist();
    }

    public function on_pre_update() {
        $this->__load();
        return parent::on_pre_update();
    }

    public function on_pre_remove() {
        $this->__load();
        return parent::on_pre_remove();
    }

    public function on_post_load() {
        $this->__load();
        return parent::on_post_load();
    }

    public function __sleep() {
        return array('__isInitialized__', 'id', 'code', 'name', 'url', 'views', 'zone', 'city', 'district', 'state', 'created_at', 'last_updated_at');
    }

    public function __clone() {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

}
