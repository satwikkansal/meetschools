<?php


class MY_URI extends CI_URI {

    public function __construct() {
        parent::__construct();
    }

    function _reindex_segments() {
        foreach($this->rsegments as $key=>$value) {
            $this->rsegments[$key] = urldecode($value);
        }
        parent::_reindex_segments();
    }
}

/* End of file MY_URI.php */
/* Location: ./application/libraries/MY_URI.php */
