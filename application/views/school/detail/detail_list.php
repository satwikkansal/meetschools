<?php

use Internshala\Helpers\Utils;

global $CI;
$CI->load->helper('url');
$CI->load->view('internship_functions');

global $session;
$main_role = $session->role()->main_role();

$internship = $data->internship;
$internship_url = base_url() . "internship/detail/" . $internship->url();
$is_internchallenge = $internship->challenge();
if ($is_internchallenge) {
    $challenge = $internship->challenge();
    $internship_url = base_url() . "internchallenge/challenges/" . $challenge->id();
}

$internship_categories = $internship->internship_categories();

$already_applied = $data->already_applied;
$can_apply = ($main_role == 'student' || $main_role == 'guest') && !$already_applied;
$can_edit = $main_role === "admin" || ($main_role === "employer" && $session->role()->owns($internship) && ($internship->status() === "draft" || $internship->status() === "pending review" || $internship->status() === "follow up"));

$is_engineering_internship = FALSE;
foreach ($internship_categories as $internship_category) {
    if ($internship_category->category()->name() == "Engineering Internship") {
        $is_engineering_internship = TRUE;
        break;
    }
}

$CI->load->view('internship/search/internship_list_item', array('internship' => $internship));
?>

<div class="internship_details container-fluid">
    <?php if ($internship->introduction()) : ?>
        <br>
        <div>
            <?= $internship->introduction() ?>
        </div>
    <?php endif; ?>
    <?php
    $company_website = $internship->company()->website();
    if ($company_website) {
        if (strpos($company_website, 'http') === FALSE) {
            $company_website = 'http://' . $company_website;
        }
        $company_link_to_display = " (<a style='cursor: pointer; font-size: 14px !important;' class='freetext-container' href='$company_website' target='_blank' rel='nofollow'>$company_website</a>)";
    } else {
        $company_link_to_display = "";
    }
    ?>

    <?php if (!$is_internchallenge) { ?>
        <h5>About <?= $internship->company()->name() . $company_link_to_display ?>:</h5>
        <div class="freetext-container">
            <?= $internship->company()->description() ?>
        </div>
    <?php } ?>

    <h5>About the Internship:</h5>
    <div class="freetext-container">
        <?= $internship->description() ?>
    </div>

    <?php if ($internship->open_positions() > 0) : ?>
        <h5># of Internships available: <span class="number_of_internships_available"><?= $internship->open_positions() ?></span>
        </h5>
    <?php endif; ?>

    <?php if (!$is_internchallenge) { ?>
        <h5>Who can apply:</h5>
        <div class="freetext-container">
            <?= $internship->who_can_apply() ?>
        </div>
    <?php } ?>

    <?php if ($internship->internship_streams()->count() > 0) : ?>
        <h5>Streams:</h5>
        <div>
            <?= Utils::limit_characters(streams($internship), 100) ?>
        </div>
    <?php endif; ?>

    <?php if ($internship->salary_performance_additional_details()) : ?>
        <h5>Additional Stipend Details:</h5>
        <div class="freetext-container">
            <?= $internship->salary_performance_additional_details() ?>
        </div>
    <?php endif; ?>

    <?php if ($internship->additional_details()) : ?>
        <h5>Additional Information:</h5>
        <div class="freetext-container">
            <?= $internship->additional_details() ?>
        </div>
    <?php endif; ?>

    <?php if ($internship->is_external()) : ?>
        <h5>Editor’s note:</h5>
        <div>
            <p>
                Information above is Internshala's interpretation and paraphrasing of what we found on the shared link. If you have any more specific information on this internship or have interned in this program before and would like to share your experience, please leave a comment.
            </p>
        </div>
    <?php endif; ?>

    <?php if ($internship->conclusion()) : ?>
        <div>
            <?= $internship->conclusion() ?>
        </div>
    <?php endif; ?>

    <?php if (!$is_internchallenge) { ?>
        <br>
        <div>
            <p>
                Have you done an internship before? Share your experience, win exciting prizes worth Rs.1 lac and once in a lifetime opportunity to get featured on Internshala :).<br>
                Check our <a href='http://blog.internshala.com/summer-internship-contests/internship-story-contest-2015/' target='_blank'>Your Internship Story 2015</a> for more details.
            </p>
        </div>
    <?php } else { ?>
        <br>
        <div>
            <p>
                If you have any queries regarding the internship, please write to us at <a href="mailto:student@internshala.com">student@internshala.com</a>.
            </p>
        </div>
    <?php } ?>

    <div class="button_container table-row" id="fb_like_container">


        <div>
            <?php if ($can_edit) { ?>
                <form id="internship_detail">
                    <?php
                    $status = $internship->status();
                    if ($main_role === "employer") {
                        $new_status = "pending review";
                    } else if ($main_role === "admin") {
                        $new_status = "active";
                    }
                    ?>
                    <input type="hidden" id="internship_id" value="<?= $internship->id() ?>" />
                    <input type="hidden" id="status" value="<?= $status ?>" />
                    <a href="/internship/view_edit/<?= $internship->id() ?>">
                        <input type="button" class="btn btn-primary internship_detail_btn" id="edit" value="Edit Internship"/>
                    </a>
                </form>
                <?php
            } else {
                $button_value = "Apply Now";
                $is_disabled = "";
                if ($is_internchallenge) {
                    $button_value = "Participate Now";
                    $today = strtotime(date("Y-m-d H:i:s"));
                    $challenge_start_date = strtotime($internship->challenge()->start_date()->format('Y-m-d H:i:s'));
                    $challenge_end_date = $internship->challenge()->end_date()->format('Y-m-d') . " " . "23:59:59";
                    $challenge_end_date = strtotime($challenge_end_date);

                    if ($today < $challenge_start_date || $today > $challenge_end_date) {
                        $is_disabled = "disabled";
                    }
                }
                if ($internship->is_active() && $can_apply) :
                    if ($internship->is_external()) :
                        ?>
                        <a href="<?= $internship->external_link() ?>" target="_blank">
                            <input type="button" class="btn btn-primary internship_detail_btn" value="<?= $button_value ?>" id="search_button" <?= $is_disabled ?>>
                        </a>
                        <?php
                    else:
                        ?>
                        <a href="/application/form/<?= htmlspecialchars($internship->url()) ?>">
                            <input type="button" class="btn btn-primary internship_detail_btn" value="<?= $button_value ?>" id="search_button" <?= $is_disabled ?>>
                        </a>
                    <?php
                    endif;
                else:
                    ?>
                    <input type="button" class="btn btn-primary internship_detail_btn" title="<?= ($main_role == 'admin' || $main_role == 'employer') ? 'For Students Only' : (!$internship->is_active() ? 'Expired or closed' : 'You have already applied for this internship') ?>" value="<?= $button_value ?>" disabled/>
                <?php endif; ?>
            <?php } ?>

        </div>
         <?php if ($main_role !== "employer") {
            ?>
            <div id="facebook_like_container">
                <iframe src="http://www.facebook.com/widgets/like.php?href=<?= $internship_url; ?>"
                        scrolling="no" frameborder="0"
                        style="border:none; height:30px"></iframe>
            </div>
        <?php } ?>
    </div>
    <hr>

    <?php
    if (!$can_edit && !$is_internchallenge) :
        ?>
        <div style="margin-bottom: 11px; text-align: center;">
            <?php
            if (isset($data->internship_cms_contents[3])) {
                $ad_id = $data->internship_cms_contents[3]->id();
                $type = $data->internship_cms_contents[3]->type();
                $content = $data->internship_cms_contents[3]->content();
                $link = $data->internship_cms_contents[3]->ad_link();
                if ($type == "image") {
                    ?>
                    <a href="<?= $link ?>" target="_blank" rel="nofollow">
                        <img class="image_ad" id="<?= $ad_id ?>" src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSrvoVoZs-JLzM6n8fTDG1MPGkTyolT6z3VucaYoZJJi2Snfv8W" style="width: 100%; max-width: 731px;"/>
                    </a><br>
                    <?php
                }
            }
            ?>
        </div>
        <?php
    endif;
    ?>

    <?php if (!$can_edit) { ?>
        <div>
            <div style="display:inline-block; width:130px; overflow:hidden">
                <fb:like href="https://www.facebook.com/pages/Internshala/116887325050240" send="true" layout="button_count" width="450" show_faces="true" font="trebuchet ms"></fb:like>
            </div>
            <div style="display:inline-block;vertical-align:top; padding-top:2px;font-weight:bold;color:#1D4088">
                Like Internshala on Facebook
            </div>
        </div>
    <?php } ?>
</div>


<?php if ($main_role !== "employer") {
    //http://local.responsive.com/internship/detail/web-mobile-app-development-internship-in-gurgaon-at-internshala1432706932
    ?>
    <div class="fb-comments" data-href="<?= $internship_url ?>" data-width="100%"></div>
<?php } ?>

