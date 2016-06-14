<?php

namespace Meetschools\DOM;

class Style extends Link {

    public function __construct($attributes) {
        if(!is_array($attributes)) {
            $attributes = array( 'href' => $attributes );
        }

        $attributes['rel'] = 'stylesheet';
        $attributes['type'] = 'text/css';
        parent::__construct($attributes);
    }
}

/* End of file style.php */
/* Location: ./application/libraries/dom/style.php */
