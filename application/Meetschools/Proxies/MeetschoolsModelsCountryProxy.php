<?php

namespace Meetschools\Proxies;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class MeetschoolsModelsCountryProxy extends \Meetschools\Models\Country implements \Doctrine\ORM\Proxy\Proxy {

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

    public function set_name($first_name) {
        $this->__load();
        return parent::set_first_name($first_name);
    }

    public function name() {
        $this->__load();
        return parent::first_name();
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
        return array('__isInitialized__', 'id', 'name', 'created_at', 'last_updated_at');
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
