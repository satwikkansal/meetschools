<?php
$page_info->add_css('/static/css/internship/detail/detail.css');
if (ENVIRONMENT == "production") {
    $page_info->add_js('/static/js/combined/internship-details.js');
} else {
    $page_info->add_js('/static/js/internship/search.js', '/static/js/internship/detail.js', '/static/js/includes/jquery-migrate-1.2.1.js', '/static/js/subscribe/subscribe.js', '/static/js/includes/chosen/prism.js', '/static/js/includes/chosen/chosen.jquery.js');
}

global $CI;

function locations_meta($internship) {
    $mapper = function($internship_location) {
        return $internship_location->location()->name();
    };
    return implode(', ', array_map($mapper, $internship->internship_locations()->toArray()));
}

$internship = isset($data->internship) ? $data->internship : NULL;
$domain = 'http://internshala.com' . $_SERVER['REQUEST_URI'];
$meta_description = $internship ? 'Apply to ' . $internship->title() . ' on Internshala for free.' : 'Internships, Summer Internships, Summer Trainings for students in India. Internships & Trainings for Engineering, MBA, Law, Media, Arts, Science, Commerce students.';

$page_info->set_title($internship ? $internship->title() . ' | Internshala' : "Internship details");
$page_info->add_meta(array('name' => 'description', 'content' => $meta_description));

$page_info->add_meta_facebook(array('property' => 'og:title', 'content' => $internship ? str_replace('&', 'and', $internship->title()) : "Internship details"));
$page_info->add_meta_facebook_description(array('property' => 'og:description', 'content' => ' '));
$page_info->add_meta_facebook_url(array('property' => 'og:url', 'content' => $domain));

$page_info->add_meta_twitter(array('name' => 'twitter:title', 'content' => $internship ? str_replace('&', 'and', $internship->title()) : "Internship details"));
$page_info->add_meta_twitter_description(array('name' => 'twitter:description', 'content' => '&nbsp;'));
$page_info->add_meta_twitter_domain(array('name' => 'twitter:domain', 'content' => $domain));
?>

<?php
$CI->load->view('subscribe/popup');
$CI->load->view('internship/vtc_popup');
?>

<?php if (!$data->success) : ?>
    <div class="container-fluid" id="content">
        <div id="error_container">
            Error: <?= $data->errorThrown ?><br><br>
            <a href="/internships"><input type="button" id="go-back" class="btn btn-primary" value="Go back to internship search"/></a>
        </div>
    </div>
    <?php
else :
    ?>

    <div class="container-fluid" id="content">
        <div class="max-width-container">
            <div id="internship_seo_heading_container">
                <h3><?= $internship->title() ?></h3>
            </div>
            <hr>
            <div class="table-row" id="reference">
                <div id="search_criteria_container">
                    <?php $CI->load->view('internship/search/search_criterias'); ?>
                </div>
                <div class="table-cell">
                    <div  class = "internship_list_container" id="internship_list_container">
                        <?php require('detail_list.php'); ?>
                    </div>
                </div>
                <div class="table-cell hidden-xs hidden-sm" id="marketing_right_container">
                    <?php $CI->load->view('internship/search/marketing_right'); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>