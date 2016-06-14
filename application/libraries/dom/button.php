<?php

namespace Meetschools\DOM;

class Button extends Text_Element {

    public function __construct($text, $attributes = array()) {
        parent::__construct($text, $attributes);
        $this->add_allowed_attributes(array('type' => 'button', 'disabled' => NULL));
    }
    
    public function tag() {
        return 'BUTTON';
    }  
}

/* End of file button.php */
/* Location: ./application/libraries/dom/button.php */
