<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Workshop\Models\User;
use Doctrine\ORM\EntityManager;

/**
 * @role(value={"guest"})
 * @method({"get"})
 */
class Home extends MY_Controller {

    public function index() {
        $data = new stdClass();
        $em = $this->em;
        $emInternshala = $this->emInternshala;

        $workshops_data = array();
        $active_workshop_dates = $em->getRepository('Workshop\Models\Workshop')->get_active_workshops_order_by_date();
        $i = 1;
        foreach ($active_workshop_dates as $active_workshop_date) {
            
            $workshops_data[$i]['name'] = $active_workshop_date['name'];
            $workshops_data[$i]['title'] = $active_workshop_date['title'];
            $workshops_data[$i]['description'] = $active_workshop_date['description'];
            $workshops_data[$i]['url'] = $active_workshop_date['url'];
            $workshops_data[$i]['meta_description'] = $active_workshop_date['meta_description'];
            $workshops_data[$i]['date'] = $active_workshop_date['workshop_on'];
            $i++;
        }
        $data->workshops = $workshops_data;

        $this->view_with_template('home/home', array('data' => $data));
    }

}
