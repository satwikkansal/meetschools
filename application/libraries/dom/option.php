<?php

namespace Meetschools\DOM;

class Option extends Text_Element {

    public function __construct($description, $attributes = array()) {
        parent::__construct($description, $attributes);
        $this->add_allowed_attributes(array('selected' => NULL, 'value' => NULL, 'disabled' => NULL));
    }
    
    public function tag() {
        return 'OPTION';
    }
}

/* End of file option.php */
/* Location: ./application/libraries/dom/option.php */
