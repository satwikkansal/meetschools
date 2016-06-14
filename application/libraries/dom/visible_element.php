<?php

namespace Meetschools\DOM;

abstract class Visible_Element extends Element {
    
    public function __construct($attributes = array(), $children = array()) {
        parent::__construct($attributes, $children);
        $this->add_allowed_attributes(array('id' => NULL, 'class' => NULL, 'style' => NULL));
    }
}

/* End of file visible_element.php */
/* Location: ./application/libraries/dom/visible_element.php */
