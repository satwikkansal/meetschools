<?php

namespace Meetschools\DOM;

class Title extends Text_Element {

    public function __construct($title) {
        parent::__construct($title);
    }

    public function tag() {
        return 'TITLE';
    }
}

/* End of file title.php */
/* Location: ./application/libraries/dom/title.php */
