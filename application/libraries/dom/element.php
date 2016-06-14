<?php

namespace Meetschools\DOM;

use Meetschools\Helpers\Utils;

abstract class Element extends Node {

    private $attributes;
    private $allowed_attributes = array();
    private $children;

    public function __construct($attributes = array(), $children = array()) {
        $this->attributes = $attributes;
        $this->children = $children;
    }

    protected function add_text(&$str, $start_indentation, $indentation) {
        $tag = strtolower($this->tag());
                
        $str .= $start_indentation . '<' . $tag;
        
        $this->print_attributes($str);

        $children = $this->children;
        if(count($children) == 0) {
            $str .= ($this->force_text_content() ? ' ></' . $tag . '>' : ' />');
            return;
        }

        $str .= ' >';
        if($this->force_single_line()) {
            $eol = '';
            $start_indentation = '';
            $indentation = '';
            $next_indentation = '';
        } else {
            $eol = PHP_EOL;
            $next_indentation = $start_indentation . $indentation;
        }
        
        for($i = 0; $i < count($children); $i++) {
            $str .= $eol;
            $children[$i]->add_text($str, $next_indentation, $indentation);
        }
        
        $str .= $eol;
        $str .= $start_indentation . '</' . $tag . '>';
    }
    
    private function print_attribute(&$str, $name, $value) {
        if ($value === NULL) {
            return;
        }
        
        if(is_bool($value)) {
            $str .= $value ? ' ' . $name : '';
            return;
        }
        
        $value = $this->html_escape($value);
        $str .= ' ' . $name . '="' .  $value . '"';
    }
    
    private function print_attributes(&$str) {
        $all_attributes = $this->attributes;
        $allowed_attributes = $this->allowed_attributes;
        if (count($allowed_attributes) == 0) {
            foreach ($all_attributes as $name => $value) {
                $this->print_attribute($str, $name, $value);
            }
            return;
        }
        foreach($allowed_attributes as $name => $value) {
            $this->print_attribute($str, $name, Utils::array_value($name, $all_attributes, $value, TRUE));
        }
    }

    protected function force_text_content() {
        return FALSE;
    }
    
    protected function force_single_line() {
        return FALSE;
    }
    
    protected function add_allowed_attributes($allowed_attributes) {
        $this->allowed_attributes = array_merge($this->allowed_attributes, $allowed_attributes);
    }
}

/* End of file element.php */
/* Location: ./application/libraries/dom/element.php */
