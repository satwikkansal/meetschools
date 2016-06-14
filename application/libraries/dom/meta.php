<?php

namespace Meetschools\DOM;

class Meta extends Element {

    public function tag() {
        return 'META';
    }

    public function __construct($attributes) {
        parent::__construct($attributes);
    }
}

/* End of file meta.php */
/* Location: ./application/libraries/dom/meta.php */
