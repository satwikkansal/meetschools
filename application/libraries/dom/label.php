<?php

namespace Meetschools\DOM;

class Label extends Text_Element {
    
    public function __construct($text, $attributes = array()) {
        parent::__construct($text, $attributes);
        
        $this->add_allowed_attributes(array('for' => NULL));
    }
    
    public function tag() {
        return 'LABEL';
    }
}

/* End of file label.php */
/* Location: ./application/libraries/dom/label.php */
