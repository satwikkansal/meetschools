<?php

/* * ***********************************************************************
  DO NOT EDIT THIS FILE
  THIS IS AUTO GENERATED FROM base.php
 * *********************************************************************** */
?><?php

$config['view_templates'] = array(
    'upload/upload' => 'iframe'
);

$config['templates'] = array(
    'default' => array('location' => 'templates/default/template.php', 'page_info_type' => 'default'),
    'ajax' => array('location' => 'templates/ajax/template.php', 'page_info_type' => 'ajax'),
    'iframe' => array('location' => 'templates/iframe/template.php', 'page_info_type' => 'default'),
    'download' => array('location' => 'templates/download/template.php', 'page_info_type' => 'default'),
);

$config['default_title'] = 'Meetschools | Schools';

$config['search_page_size'] = 40;
$config['app_search_page_size'] = 10;

$config['salutations'] = array(
    'mr' => 'Mr.',
    'mrs' => 'Mrs.',
    'ms' => 'Ms.',
    'dr' => 'Dr.'
);

$config['bucket_name'] = 'meetschoolsuploads';

$config['lock_dir'] = BASEPATH . '../locks';

$config['recaptcha_public_key'] = '6LfE3h4TAAAAAAF5tNA9dR6j4fEwHzP4i_tQpUF-';

$config['recaptcha_private_key'] = '6LfE3h4TAAAAADVzmmMlaGYgEX1UXMR3Mrph-ao_';

$config['sso_authentication_keys'] = array();

/* End of file base.php */
/* Location: ./application/config/base.php */
