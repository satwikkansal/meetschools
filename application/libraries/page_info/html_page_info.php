<?php

namespace Meetschools\Page_Info;

use Meetschools\DOM\Title;

class Html_Page_Info extends Page_Info {

    private $styles = array();
    private $scripts = array();
    private $metas = array();
    private $metas_facebook = array();
    private $metas_facebook_description = array();
    private $metas_facebook_url = array();
    private $metas_facebook_image = array();
    private $metas_twitter = array();
    private $metas_twitter_description = array();
    private $metas_twitter_domain = array();
    private $metas_twitter_image = array();
    private $title;

    private function add_to(&$to, $constructor, $values) {
        foreach ($values as $value) {
            $to[] = new $constructor($value);
        }
    }

    public function set_title($title) {
        $this->title = $title;
    }

    public function add_css() {
        $file_array = array();
        foreach (func_get_args() as $file) {
            $file_array[] = $this->auto_version($file);
        }
        $this->styles = array_merge($this->styles, $file_array);
    }

    public function remove_css() {
        $this->remove_from_array(func_get_args(), $this->styles);
    }

    public function add_js() {
        $file_array = array();
        foreach (func_get_args() as $file) {
            $file_array[] = $this->auto_version($file);
        }
        $this->scripts = array_merge($this->scripts, $file_array);
    }

    public function remove_js() {
        $this->remove_from_array(func_get_args(), $this->scripts);
    }

    public function add_meta() {
        $this->metas = func_get_args();
    }

    public function add_meta_facebook() {
        $this->metas_facebook = func_get_args();
    }

    public function add_meta_facebook_description() {
        $this->metas_facebook_description = func_get_args();
    }

    public function add_meta_facebook_url() {
        $this->metas_facebook_url = func_get_args();
    }
        
    public function add_meta_facebook_image(){
        $this->metas_facebook_image = func_get_args();
    }

    public function add_meta_twitter() {
        $this->metas_twitter = func_get_args();
    }

    public function add_meta_twitter_description() {
        $this->metas_twitter_description = func_get_args();
    }

    public function add_meta_twitter_domain() {
        $this->metas_twitter_domain = func_get_args();
    }

    public function add_meta_twitter_image(){
        $this->metas_twitter_image = func_get_args();
    }

    public function execute() {
        $elements = array();

        $title = $this->title;
        if (isset($title)) {
            $elements[] = new Title($title);
        }
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas));
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas_facebook));
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas_facebook_description));
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas_facebook_url));
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas_facebook_image));
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas_twitter));
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas_twitter_description));
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas_twitter_domain));
        $this->add_to($elements, 'Meetschools\DOM\Meta', array_unique($this->metas_twitter_image));
        $this->add_to($elements, 'Meetschools\DOM\Style', array_unique($this->styles));
        $this->add_to($elements, 'Meetschools\DOM\Script', array_unique($this->scripts));
        foreach ($elements as $element) {
            echo $element->to_string('        ') . PHP_EOL;
        }
    }

    public function execute_js() {
        $elements = array();

        $this->add_to($elements, 'Meetschools\DOM\Script', array_unique($this->scripts));
        foreach ($elements as $element) {
            echo $element->to_string('        ') . PHP_EOL;
        }
    }

    private function remove_from_array(array $what, array & $from) {
        foreach ($what as $w) {
            $index = array_search($w, $from);
            if ($index !== FALSE) {
                unset($from[$index]);
            }
        }
    }

    private function auto_version($file) {
        if (strpos($file, '/') !== 0 || !file_exists($_SERVER['DOCUMENT_ROOT'] . $file))
            return $file;

        if (strpos($file, "/static/css") !== 0 && strpos($file, "/static/js") !== 0)
            return $file;

        $mtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $file);

        if (strpos($file, '11111') !== false) {
            $mtime = "";
        }

        return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1", $file);
    }

}

/* End of file html_page_info.php */
/* Location: ./application/libraries/page_info/html_page_info.php */