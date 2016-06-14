<?php

namespace Meetschools\DOM;

class Checkbox extends Abstract_Input {

    public function __construct($attributes = array(), $type='checkbox') {
        parent::__construct($attributes);
        $this->add_allowed_attributes(array('type' => $type, 'value' => NULL, 'checked' => NULL));
    }
    
    public function tag() {
        return 'INPUT';
    }
}

/* End of file checkbox.php */
/* Location: ./application/libraries/dom/checkbox.php */
