<?php

namespace Meetschools\DOM;

class Text_Node extends Node {

    private $content;

    public function __construct($content) {
        $this->content = $content;
    }

    protected function add_text(&$str, $start_indentation, $indentation) {
        $str .= $start_indentation . $this->html_escape($this->content);
    }

    public function tag() {
        return 'TEXT_NODE';
    }
}

/* End of file text_node.php */
/* Location: ./application/libraries/dom/text_node.php */
