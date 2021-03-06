<?php

namespace Meetschools\Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class MeetschoolsModelsAdminProxy extends \Meetschools\Models\Admin implements \Doctrine\ORM\Proxy\Proxy {

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

    public function set_first_name($first_name) {
        $this->__load();
        return parent::set_first_name($first_name);
    }

    public function first_name() {
        $this->__load();
        return parent::first_name();
    }

    public function set_last_name($last_name) {
        $this->__load();
        return parent::set_last_name($last_name);
    }

    public function last_name() {
        $this->__load();
        return parent::last_name();
    }

    public function set_country_code($country_code) {
        $this->__load();
        return parent::set_country_code($country_code);
    }

    public function country_code() {
        $this->__load();
        return parent::country_code();
    }

    public function set_phone_primary($phone_primary) {
        $this->__load();
        return parent::set_phone_primary($phone_primary);
    }

    public function phone_primary() {
        $this->__load();
        return parent::phone_primary();
    }

    public function set_unique_key($unique_key) {
        $this->__load();
        return parent::set_unique_key($unique_key);
    }

    public function unique_key() {
        $this->__load();
        return parent::unique_key();
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

    public function user() {
        $this->__load();
        return parent::user();
    }

    public function set_user(\Meetschools\Models\User $user) {
        $this->__load();
        return parent::set_user($user);
    }

    public function full_name() {
        $this->__load();
        return parent::full_name();
    }

    public function phone() {
        $this->__load();
        return parent::phone();
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
        return array('__isInitialized__', 'id', 'user', 'first_name', 'last_name', 'country_code', 'phone_primary', 'unique_key', 'created_at', 'last_updated_at');
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
