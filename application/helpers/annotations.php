<?php

namespace Meetschools\Annotations;

use Doctrine\Common\Annotations\Annotation;
use Meetschools\Helpers\Utils;

/** @Annotation */
final class Method extends Annotation {

    public $value = array('post');
}

/** @Annotation */
final class Resource extends Annotation {

    public $path;
}

/** @Annotation */
final class Role extends Annotation {
    
    public $value;
    public $strict = FALSE;
    public $on_fail;
    public $login_referer;
    public $login_success_page;
    
    public function validate() {
        return !Utils::is_null_or_empty($this->value);
    }
}

/* End of file annotations.php */
/* Location: ./application/helpers/annotations.php */