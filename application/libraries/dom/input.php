<?php

namespace Meetschools\DOM;

class Input extends Abstract_Input {

    public function __construct($attributes = array()) {
        parent::__construct($attributes);
        $this->add_allowed_attributes(array('mask' => NULL, 'value' => NULL, 'type' => 'text', 'maxlength' => NULL, 'autocomplete' => NULL, 'isautocomplete' => NULL, 'placeholder' => NULL));
    }
    
    public function tag() {
        return 'INPUT';
    }
}

/* End of file input.php */
/* Location: ./application/libraries/dom/input.php */
