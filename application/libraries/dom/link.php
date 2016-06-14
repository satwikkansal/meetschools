<?php

namespace Meetschools\DOM;

class Link extends Element {

    public function tag() {
        return 'LINK';
    }

    public function __construct($attributes) {
        parent::__construct($attributes);
    }
}

/* End of file link.php */
/* Location: ./application/libraries/dom/link.php */
