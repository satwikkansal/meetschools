<?php

namespace Meetschools\DOM;

abstract class Abstract_Input extends Visible_Element {

    public function __construct($attributes = array(), $children = array()) {
        parent::__construct($attributes, $children);
        
        $this->add_allowed_attributes(array('name' => NULL, 'validators' => NULL, 'disabled' => NULL, 'readonly' => NULL));
    }
}

/* End of file element.php */
/* Location: ./application/libraries/dom/element.php */
