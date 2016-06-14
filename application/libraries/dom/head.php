<?php

namespace Meetschools\DOM;

class Head extends Element {

    public function tag() {
        return 'HEAD';
    }

    public function __construct($children) {
        parent::__construct(array(), $children);
    }
}

/* End of file head.php */
/* Location: ./application/libraries/dom/head.php */
