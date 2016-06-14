<?php

namespace Meetschools\DOM;

abstract class Node {

    protected abstract function tag();

    protected abstract function add_text(&$str, $start_indentation, $indentation);
    
    public function to_string($start_indentation = '', $indentation = '    ') {
        $str = '';
        $this->add_text($str, $start_indentation, $indentation);
        return $str;
    }
    
    protected function html_escape($str) {
        if($str === NULL) {
            return NULL;
        }
        if(is_numeric($str)){
            return strval($str);
        }
        if(is_bool($str)) {
            return $str ? 'true' : 'false';
        }
        if(!is_string($str)) {
            throw new \Exception('html string should be a string.');
        }
        return htmlspecialchars($str);
    }
}

/* End of file node.php */
/* Location: ./application/libraries/dom/node.php */
