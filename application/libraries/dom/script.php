<?php

namespace Meetschools\DOM;

class Script extends Element {

    public function tag() {
        return 'SCRIPT';
    }

    public function __construct($attributes, $version = NULL) {
        if(!is_array($attributes)) {
            $attributes = array( 'src' => $attributes );
        }

        $type = 'text/javascript';
        if($version == '1.7') {
            $type .= ';version=1.7';
        } else if ($version == '1.8') {
            $type .= ';version=1.8';
        }
        $attributes['type'] = $type;

        parent::__construct($attributes);
    }

    protected function force_text_content() {
        return TRUE;
    }
}

/* End of file script.php */
/* Location: ./application/libraries/dom/script.php */
