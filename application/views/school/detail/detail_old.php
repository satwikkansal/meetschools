<?php

use Internshala\Helpers\Utils;

$page_info->add_css('/static/css/common/tabs.css');
$page_info->add_js('/static/js/common/tabs.js', '/static/js/detail/detail.js');

global $session;
$role = $session->role();
?>
<div class="container">
    <div class="row">
        <ul class="span3" style="margin-right:20px;width:430px;float:right">
            <!--<li class="ourbutton" style="float:right;margin-left:6px">
                <a href="<?= $role->dashboard_url() ?>">
                    <input type="submit" value="Go To Dashboard"/>
                </a>
            </li>-->
        </ul>
        <?php
        require('detail_ajax.php');
        ?>
    </div>
</div>