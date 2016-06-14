<?php

class Dom {

    public function __construct() {
        require_once('dom/node.php');
        require_once('dom/element.php');
        require_once('dom/text_node.php');
        require_once('dom/visible_element.php');
        require_once('dom/text_element.php');
        require_once('dom/head.php');
        require_once('dom/title.php');
        require_once('dom/link.php');
        require_once('dom/meta.php');
        require_once('dom/script.php');
        require_once('dom/style.php');
        require_once('dom/abstract_input.php');
        require_once('dom/input.php');
        require_once('dom/select.php');
        require_once('dom/option.php');
        require_once('dom/label.php');
        require_once('dom/button.php');
        require_once('dom/textarea.php');
        require_once('dom/checkbox.php');
    }
}

/* End of file Dom.php */
/* Location: ./application/libraries/Dom.php */