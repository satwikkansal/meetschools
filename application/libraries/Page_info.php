<?php

use Meetschools\Page_Info\Html_Page_Info;
use Meetschools\Page_Info\Ajax_Page_Info;

class Page_Info {

    public function create_instance($type = NULL) {
        if($type === 'none') {
            return NULL;
        }
        
        require_once('page_info/page_info.php');

        if($type == 'ajax') {
            require_once('page_info/ajax_page_info.php');
            return new Ajax_Page_Info();
        }
        
        $CI =& get_instance();
        $CI->load->library('dom');

        require_once('page_info/html_page_info.php');
        return new Html_Page_Info();
    }
}


/* End of file Page_info.php */
/* Location: ./application/libraries/Page_info.php */