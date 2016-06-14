<?php
global $CI;

if (!$schools) {
    ?>
<span class="results-number">:( Sorry, currently there are no schools matching your requirement</span>
    <?php
} else {
    ?>
    <span class="results-number">About 384,907 schools</span>

    <?php
    foreach ($schools as $school) {
        $CI->load->view('school/search/school_list_item', array('school' => $school));
    }
}
?>
<?php if (!isset($source)) { ?>
    <div class="margin-bottom-30"></div>
    <div class="text-left">
        <ul class="pagination">
            <li><a href="#">«</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">157</a></li>
            <li><a href="#">158</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
<?php } ?>