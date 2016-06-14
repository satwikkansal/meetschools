<?php

$page_info = $data['page_info'];
global $CI;
$page_info->set_title($CI->config->item('default_title'));
$page_info->add_meta(array('charset' => 'utf-8'));
$page_info->add_css('/static/css/base.css');
$page_info->add_js('/static/js/jquery-1.6.2.js');

$view_html = $CI->load->view($view, $data, TRUE);
?><html lang="en">
    <head>
<?=$page_info->execute()?>
    </head>
    <body>
        <?=$view_html?>
    </body>
</html>
