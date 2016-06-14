<?php

//use Workshop\Helpers\Error_Log_Builder;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package        CodeIgniter
 * @author        ExpressionEngine Dev Team
 * @copyright    Copyright (c) 2006, EllisLab, Inc.
 * @license        http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since        Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------
/**
 * MY_Logging Class
 *
 * This library assumes that you have a config item called
 * $config['show_in_log'] = array();
 * you can then create any error level you would like, using the following format
 * $config['show_in_log']= array('DEBUG','ERROR','INFO','SPECIAL','MY_ERROR_GROUP','ETC_GROUP'); 
 * Setting the array to empty will log all error messages. 
 * Deleting this config item entirely will default to the standard
 * error loggin threshold config item. 
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    Logging
 * @author        ExpressionEngine Dev Team. Mod by Chris Newton
 */
class MY_Log extends CI_Log {

    /**
     * Constructor
     *
     * @access    public
     * @param    array the array of loggable items
     * @param    string    the log file path
     * @param     string     the error threshold
     * @param    string    the date formatting codes
     */
    public function __construct() {
        parent::__construct();

        date_default_timezone_set('Asia/Calcutta');
        $config = & get_config();
        if (isset($config['show_in_log'])) {
            $show_in_log = $config['show_in_log'];
        } else {
            $show_in_log = "";
        }
        $this->log_path = ($config['log_path'] != '') ? $config['log_path'] : APPPATH . 'logs/';

        if (!is_dir($this->log_path) OR !is_really_writable($this->log_path)) {
            $this->_enabled = FALSE;
        }
        if (is_array($show_in_log)) {
            $this->_logging_array = $show_in_log;
        }
        if (is_numeric($config['log_threshold'])) {
            $this->_threshold = $config['log_threshold'];
        }
        if ($config['log_date_format'] != '') {
            $this->_date_fmt = $config['log_date_format'];
        }
    }

    // --------------------------------------------------------------------
    /**
     * Write Log File
     *
     * Generally this function will be called using the global log_message() function
     *
     * @access    public
     * @param    string    the error level
     * @param    string    the error message
     * @param    bool    whether the error is a native PHP error
     * @return    bool
     */
    public function write_log($level = 'error', $msg, $php_error = FALSE) {
        if ($this->_enabled === FALSE) {
            return FALSE;
        }
        $level = strtoupper($level);

        if (isset($this->_logging_array)) {
            if ((!in_array($level, $this->_logging_array)) && (!empty($this->_logging_array))) {
                return FALSE;
            }
        } else {
            if (!isset($this->_levels[$level]) OR ( $this->_levels[$level] > $this->_threshold)) {
                return FALSE;
            }
        }

        $filepath = $this->log_path . 'log.php';
        $message = '';

        if (!file_exists($filepath)) {
            $message .= "<" . "?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?" . ">\n\n";
        }

        if (!$fp = @fopen($filepath, FOPEN_WRITE_CREATE)) {
            return FALSE;
        }

        if ($level === 'ERROR') {
            if (php_sapi_name() != "cli") {
                global $session;
                $main_role = $session->role() ? $session->role()->main_role() : NULL;
                $user_id = $main_role !== "guest" ? $session->role()->user()->id() : "Guest";

                $message .= "Level: " . $level . "\n";
                $message .= "Date: " . date($this->_date_fmt) . "\n";
                $message .= "User_id: " . $user_id . "\n";
                $message .= "Role: " . $main_role . "\n";
                $message .= "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
                $message .= "Request Method: " . $_SERVER["REQUEST_METHOD"] . "\n";
                $message .= "Request URL: " . $_SERVER["REQUEST_URI"] . "\n";
                $message .= "User Agent: " . $_SERVER['HTTP_USER_AGENT'] . "\n";
            } else {
                $message .= "IP: " . gethostname() . "\n";
                $message .= "Request Method: CLI \n";
                $message .= "Function Name: " . $_SERVER['argv'][0] . " " . $_SERVER['argv'][1] . " " . $_SERVER['argv'][2] . "\n";
            }
            $message .= "Message: " . mb_strimwidth($msg, 0, 550, "...") . "\n";
            $message .= "*************************************************************************************************\n\n";

            $data = new stdClass();
            $data->user = php_sapi_name() == "cli" ? NULL : $user_id;
            $data->user_type = php_sapi_name() == "cli" ? "user" : $main_role;
            $data->ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER["REMOTE_ADDR"] : (gethostname() ? : NULL);
            $data->request_method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : (php_sapi_name() == "cli" ? "CLI" : NULL);
            $data->url = isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : (php_sapi_name() == "cli" ? $_SERVER['argv'][0] . " " . $_SERVER['argv'][1] . " " . $_SERVER['argv'][2] : NULL);
            $data->referral_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : NULL;
            $data->user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : NULL;
            $data->message = $msg;
            $data->level = $level;
        } else if (ENVIRONMENT === "development") {
            $message .= $level . ' ' . (($level == 'INFO') ? ' -' : '-') . ' ' . date($this->_date_fmt) . ' --> ' . mb_strimwidth($msg, 0, 550, "...") . "\n\n";
        }
        //$message .= $level . ' ' . (($level == 'INFO') ? ' -' : '-') . ' ' . date($this->_date_fmt) . ' --> ' . "$msg\nURL: " . $_SERVER["REQUEST_URI"] . "\n";

        flock($fp, LOCK_EX);
        fwrite($fp, $message);
        flock($fp, LOCK_UN);
        fclose($fp);

        if ($level === 'ERROR') {
//            $error_log_builder = new Error_Log_Builder();
//            $error_log_builder->add_error_log($data);
        }

        @chmod($filepath, DIR_WRITE_MODE);
        @chown($filepath, "nginx");
        @chgrp($filepath, "nginx");

        return TRUE;
    }

}
