<?php

namespace Meetschools\DOM;

class Textarea extends Text_Element {

    public function __construct($text, $attributes = array()) {
        parent::__construct($text, $attributes);
        $this->add_allowed_attributes(array('name'=> NULL, 'rows' => NULL, 'cols' => NULL, 'disabled' => NULL, 'readonly' => NULL, 'validators' => NULL));
    }
    
    public function tag() {
        return 'TEXTAREA';
    }
}

/* End of file textarea.php */
/* Location: ./application/libraries/dom/textarea.php */
