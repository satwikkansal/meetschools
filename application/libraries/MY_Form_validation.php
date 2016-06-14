<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MY_Form_validation extends CI_Form_validation {

    function __construct() {
        parent::__construct();
    }

    function url_check($url) {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return TRUE;
        } else {
            $this->set_message('url_check', 'The %s field is not a valid url');
            return FALSE;
        }
    }

    function country_code_check($country_code) {
        if (preg_match('/^[\+][0-9]{1,5}$/', $country_code) && count($country_code) <= 5) {
            return TRUE;
        } else {
            $this->set_message('country_code_check', 'The %s field is not a valid country code');
            return FALSE;
        }
    }

    function phone_number_check($phone_number, $country_code = FALSE) {
        if ($country_code && $country_code != '+91') {
            return TRUE;
        }
        if (preg_match('/^[789][0-9]{9}$/', $phone_number)) {
            return TRUE;
        } else {
            $this->set_message('phone_number_check', 'The %s field is not a valid phone number');
            return FALSE;
        }
    }

    function valid_city($city) {
        if (preg_match('/^[a-zA-Z]+[a-zA-Z ,]*$/', $city)) {
            return TRUE;
        } else {
            $this->set_message('valid_city', 'The %s field is not a valid City');
            return FALSE;
        }
    }

    function valid_institute($institute) {
        if (preg_match("/^[a-zA-Z]+[a-zA-Z .(),&']*$/", $institute)) {
            return TRUE;
        } else {
            $this->set_message('valid_institute', 'The %s field is not a valid Institute');
            return FALSE;
        }
    }

    function valid_degree($degree) {
        if (preg_match("/^[a-zA-Z]+[a-zA-Z .(),&']*$/", $degree) || $degree === "10th" || $degree === "12th" || strpos($degree, "5 Years") !== false) {
            return TRUE;
        } else {
            $this->set_message('valid_degree', 'The %s field is not a valid Degree');
            return FALSE;
        }
    }

    function valid_stream($stream) {
        if (preg_match("/^[a-zA-Z]+[a-zA-Z .(),&']*$/", $stream)) {
            return TRUE;
        } else {
            $this->set_message('valid_stream', 'The %s field is not a valid Stream');
            return FALSE;
        }
    }

    function year_of_graduation($year_of_graduation, $current_year) {
        if ($current_year === 'already a graduate') {
            if ($year_of_graduation <= date("Y")) {
                return TRUE;
            } else {
                $this->set_message('year_of_graduation', 'The %s field must be less than or equal to ' . date("Y"));
                return FALSE;
            }
        } else {
            if ($year_of_graduation >= date("Y")) {
                return TRUE;
            } else {
                $this->set_message('year_of_graduation', 'The %s field must be greater than or equal to ' . date("Y"));
                return FALSE;
            }
        }
    }

    function valid_performance($performance_pg, $scale) {
        if ($performance_pg <= preg_replace("/[^0-9]/", '', $scale)) {
            return TRUE;
        } else {
            $this->set_message('valid_performance', 'The %s field must be less than or equal to ' . preg_replace("/[^0-9]/", '', $scale));
            return FALSE;
        }
    }

    function mimes($file, $mimes) {
        $extension = end((explode(".", $file["name"])));
        $mime_array = explode(":", $mimes);

        if (in_array($extension, $mime_array)) {
            return TRUE;
        } else {
            $this->set_message('mimes', 'The %s field must be of type ' . implode(",", $mime_array));
            return FALSE;
        }
    }

    function size($file, $size) {
        if ($file['error'] != 1) {
            if ($file['size'] <= $size) {
                return TRUE;
            } else {
                $this->set_message('size', 'The %s field size must be less than or equal to  ' . $size / (1024 * 1024) . ' MB');
                return FALSE;
            }
        } else {
            $this->set_message('size', 'There is problem in uploading file');
            return FALSE;
        }
    }

    function less_than_equal_to($field, $value) {
        if ($field <= $value) {
            return TRUE;
        } else {
            $this->set_message('less_than_equal_to', 'The %s field must be less than or equal to ' . $value);
            return FALSE;
        }
    }

    function check_enum($field, $enum) {
        $enum_array = explode(":", $enum);
        if (in_array($field, $enum_array)) {
            return TRUE;
        } else {
            $this->set_message('check_enum', 'The %s field is invalid');
            return FALSE;
        }
    }

    function valid_date($date) {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {

            return true;
        } else {
            $this->set_message('valid_date', 'The %s field is not in a valid date format (yyyy-mm-dd)');
            return false;
        }
    }

    function max_date($date, $max_date_values) {
        $max_date_array = explode(":", $max_date_values);
        foreach ($max_date_array as $max_date) {
            if ($max_date < $date) {
                $this->set_message('max_date', 'The %s field should be smaller than or equal to ' . $max_date);
                return FALSE;
            }
        }
        return TRUE;
    }

    function min_date($date, $min_date_values) {
        $min_date_array = explode(":", $min_date_values);
        foreach ($min_date_array as $min_date) {
            if ($min_date <= $date) {
                return TRUE;
            } else {
                $this->set_message('min_date', 'The %s field should be greater than or equal to ' . $min_date);
                return false;
            }
        }
    }

    function check_duplicate($field) {
        $field_array = explode(",", $field);
        $duplicate_values = array_unique(array_diff_assoc($field_array, array_unique($field_array)));
        if (count($duplicate_values) > 0) {
            $this->set_message('check_duplicate', 'The %s field have duplicate values');
            return false;
        } else {
            return TRUE;
        }
    }

    function max_length_multivalue($field, $max_value) {
        $length_exceeded = 0;
        $field_array = explode(",", $field);
        foreach ($field_array as $field_value) {
            if (strlen($field_value) > $max_value) {
                $this->set_message('max_length_multivalue', 'The %s field values can have maximum length of' . $max_value);
                $length_exceeded = 1;
                break;
            }
        }
        if ($length_exceeded) {
            return False;
        } else {
            return True;
        }
    }

    function single_value($field) {
        $field_array = explode(",", $field);
        if (count($field_array) > 1) {
            $this->set_message('single_value', 'The %s field can have only single value');
            return false;
        } else {
            return TRUE;
        }
    }

    function valid_multiple_email($field) {
        $invalid_email = 0;
        $field_array = explode(",", $field);
        foreach ($field_array as $email) {
            if (!parent::valid_email($email)) {
                $invalid_email = 1;
                break;
            }
        }
        if ($invalid_email) {
            $this->set_message('valid_multiple_email', 'The %s field have invalid email id');
            return false;
        } else {
            return TRUE;
        }
    }

    /**
     * Run the Validator
     *
     * This function does all the work.
     *
     * @access	public
     * @return	bool
     */
    function run($group = '') {
        // Do we even have any data to process?  Mm?
        if (count($_POST) == 0 && count($_FILES) == 0) {
            $this->_error_array['no_input'] = 'Input not recieved, please fill form again and submit';
            return FALSE;
        }

        // Does the _field_data array containing the validation rules exist?
        // If not, we look to see if they were assigned via a config file
        if (count($this->_field_data) == 0) {
            // No validation rules?  We're done...
            if (count($this->_config_rules) == 0) {
                return FALSE;
            }

            // Is there a validation rule for the particular URI being accessed?
            $uri = ($group == '') ? trim($this->CI->uri->ruri_string(), '/') : $group;

            if ($uri != '' AND isset($this->_config_rules[$uri])) {
                $this->set_rules($this->_config_rules[$uri]);
            } else {
                $this->set_rules($this->_config_rules);
            }

            // We're we able to set the rules correctly?
            if (count($this->_field_data) == 0) {
                log_message('debug', "Unable to find validation rules");
                return FALSE;
            }
        }

        // Load the language file containing error messages
        $this->CI->lang->load('form_validation');

        // Cycle through the rules for each field, match the
        // corresponding $_POST or $_FILES item and test for errors
        foreach ($this->_field_data as $field => $row) {
            // Fetch the data from the corresponding $_POST or $_FILES array and cache it in the _field_data array.
            // Depending on whether the field name is an array or a string will determine where we get it from.

            if ($row['is_array'] == TRUE) {

                if (isset($_FILES[$field])) {
                    $this->_field_data[$field]['postdata'] = $this->_reduce_array($_FILES, $row['keys']);
                } else {
                    $this->_field_data[$field]['postdata'] = $this->_reduce_array($_POST, $row['keys']);
                }
            } else {
                if (isset($_POST[$field]) AND $_POST[$field] != "") {
                    $this->_field_data[$field]['postdata'] = $_POST[$field];
                } else if (isset($_FILES[$field]) AND $_FILES[$field] != "") {
                    $this->_field_data[$field]['postdata'] = $_FILES[$field];
                }
            }

            $this->_execute($row, explode('|', $row['rules']), $this->_field_data[$field]['postdata']);
        }

        // Did we end up with any errors?
        $total_errors = count($this->_error_array);

        if ($total_errors > 0) {
            $this->_safe_form_data = TRUE;
        }

        // Now we need to re-set the POST data with the new, processed data
        $this->_reset_post_array();

        // No errors, validation passes!
        if ($total_errors == 0) {
            return TRUE;
        }

        // Validation fails
        return FALSE;
    }

    // --------------------------------------------------------------------

    /**
     * Alpha
     *
     * @access	public
     * @param	string
     * @return	bool
     */
    function alpha($str) {
        return (!preg_match("/^([a-zA-Z ])+$/i", $str)) ? FALSE : TRUE;
    }

}
