<?php

namespace Meetschools\DOM;

use Meetschools\Helpers\Utils;

class Select extends Abstract_Input {

    public function __construct($attributes = array(), $children = array()) {
        parent::__construct($attributes, $children);
        $this->add_allowed_attributes(array('multiple' => NULL));
    }
        
    public function tag() {
        return 'SELECT';
    }
    
    protected function force_text_content() {
        return TRUE;
    }
}

/* End of file select.php */
/* Location: ./application/libraries/dom/select.php */
