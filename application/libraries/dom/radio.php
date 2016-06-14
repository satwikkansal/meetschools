<?php

namespace Meetschools\DOM;

class Radio extends Abstract_Input {

    public function __construct($attributes = array()) {
        parent::__construct($attributes);
        $this->add_allowed_attributes(array('name'=> NULL, 'disabled' => NULL, 'validators' => NULL));
    }
    
    public function tag() {
        return 'INPUT';
    }
}

/* End of file radio.php */
/* Location: ./application/libraries/dom/radio.php */
