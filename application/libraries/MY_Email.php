<?php

use Meetschools\Helpers\Utils;
use Doctrine\ORM\EntityManager;

class MY_Email extends CI_Email {

    private $default_headers;
    private $em;

    public function __construct($config = array()) {
        $this->default_headers = Utils::array_value('default_headers', $config);
        unset($config['default_headers']);
        parent::__construct($config);
    }

    public function clear($clear_attachments = FALSE) {
        parent::clear($clear_attachments);
        $default_headers = $this->default_headers;
        foreach ($default_headers as $key => $value) {
            $this->_headers[$key] = $value;
        }
    }

    private function message_from_template($ci, $template, $data) {
        $ci->load->library('parser');
        return ($ci->parser->parse($template, $data, TRUE));
    }

    private function array_to_string($array) {
        if (!isset($array)) {
            return null;
        }
        if (is_string($array)) {
            return $array;
        }
        return implode(',', $array);
    }

    private function build_email_template($mail_type, &$message, $subject, $to, $attachment = NULL, $reply_to = 'ankur@meetschools.com', $from = 'ankur@meetschools.com', $from_name = NULL, $template_data = NULL) {
        $this->clear(TRUE);
        $this->set_mailtype("html");

        if ($attachment) {
            $this->attach($attachment);
        }

        $cc = NULL;
        $bcc = NULL;

        $this->reply_to($reply_to);
        $this->from($from, 'Meetschools');
        if (ENVIRONMENT != "development") {
            $bcc = 'ankur@meetschools.com';
            $cc = NULL;
        } else {
            $bcc = NULL;
            //replace with your email address
            $to = 'ankur@meetschools.com';
        }
        //echo $to;
        //die();
        $this->to($to);
        $this->subject($subject);
        
        $message = $message;
    }

    private function populate_mailer($item) {
        $this->clear();

        $to = $item->mail_to();
        if ($to && $to !== "NULL") {
            $this->to($to);
        }

        $cc = $item->cc();
        if ($cc && $cc !== "NULL") {
            $this->cc($cc);
        }

        $bcc = $item->bcc();
        if ($bcc && $bcc !== "NULL") {
            $this->bcc($bcc);
        }

        $this->subject($item->subject());
        $this->message($item->message());
        $this->set_mailtype("html");

        $alt_message = $item->alt_message();
        if ($alt_message && $alt_message !== "NULL") {
            $this->set_alt_message($alt_message);
        }

        $mail_type = $item->type();
        if ($mail_type == 'student') {
            $this->reply_to('workshop@meetschools.com', 'Internshala Workshop');
            $this->from('workshop@meetschools.com', 'Internshala Workshop');
        }
    }

    public function send_with_php_template($ci, $em, $mail_type, $template_data, $template, $subject, $to, $attachment = NULL, $reply_to = 'no-reply@meetschools.com', $from = 'no-reply@meetschools.com') {
        $this->em = $em;

        $message = $ci->load->view($template, $template_data, TRUE);
        $message = str_replace("<br />\n.<br />", ".<br />", $message);

        $from_name = NULL;
        $this->build_email_template($mail_type, $message, $subject, $to, $attachment, $reply_to, $from, $from_name, $template_data);

        $this->message($message);

        parent::send();
    }

    public function send_m($ci, $em, $mail_type, $template_data, $template, $subject, $to, $attachment = NULL, $reply_to = 'no-reply@meetschools.com', $from = 'no-reply@meetschools.com') {
        $this->em = $em;

        $message = $this->message_from_template($ci, $template, $template_data);

        $this->build_email_template($mail_type, $message, $subject, $to, $attachment, $reply_to, $from);

        $this->message($message);

        parent::send();
    }

    public function send_item_from_queue($item) {
        $this->populate_mailer($item);

        if (ENVIRONMENT == "development") {
            //replace with your email address
            $this->to('ankur@meetschools.com');
        }

        return parent::send();
    }

}

/* End of file MY_Email.php */
/* Location: ./application/libraries/MY_Email.php */
