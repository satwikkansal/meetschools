<?php

namespace Meetschools\DOM;

use Meetschools\Helpers\Utils;

abstract class Text_Element extends Visible_Element {

    public function __construct($text, $attributes = array()) {
        if(Utils::is_null_or_empty($text)) {
            parent::__construct($attributes);
            return;
        }
        
        $child = new Text_Node($text);
        parent::__construct($attributes, array($child));
    }
            
    protected function force_text_content() {
        return TRUE;
    }
    
    protected function force_single_line() {
        return TRUE;
    }
}

/* End of file option.php */
/* Location: ./application/libraries/dom/option.php */
