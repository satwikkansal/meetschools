<?php

namespace Meetschools\Exceptions;

class Cannot_Read_File_Exception extends \Exception {
    
    public function __construct($message, $code = NULL, $previous = NULL) {
        parent::__construct($message, $code, $previous);
    }
}

/* End of file Cannot_Read_File_Exception.php */
/* Location: ./application/models/Meetschools/Helpers/Cannot_Read_File_Exception.php */

