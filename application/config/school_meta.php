<?php

$config['organization_types'] = array (
    'Academic' => array('id' => 'Academic', 'name' => 'Academic'),
    'NGO' => array('id' => 'NGO', 'name' => 'NGO'),
    'Government' => array('id' => 'Government', 'name' => 'Government'),
    'Corporate' => array('id' => 'Corporate', 'name' => 'Corporate'),
    'Startup' => array('id' => 'Startup', 'name' => 'Startup')
);

$config['internship_types'] = array (
    'regular' => array('id' => 'regular', 'name' => 'Regular'),
    'virtual' => array('id' => 'virtual', 'name' => 'Virtual')
    //'campus_ambassador' => array('id' => 'campus_ambassador', 'name' => 'Campus Ambassador') //Just remove comment to make Campus Ambassador option active again.
);


$config['salary_scale'] = array (
    'perweek' => '/Week',
    'permonth' => '/Month',    
    'lumpsum' => 'Lump-Sum'
);

$config['salary_currency'] =  array (
    'rs' => 'Rs.',
    'dollar' => '$',
    'euro' => '€',
    'pound_sterling' => '£',
    'swiss_franc' => 'CHF',
    'singapore_dollar' => 'SGD',
    'yen' => 'Yen',
    'nis' => 'NIS',
    'jpy' => 'JPY'
);

/* End of file internship_meta.php */
/* Location: ./application/config/internship_meta.php */
