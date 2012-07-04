<?php
$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));
$haslogo = (!empty($PAGE->theme->settings->logo));
$hasdisclaimer = (!empty($PAGE->theme->settings->disclaimer));
$hascopyright = (!empty($PAGE->theme->settings->copyright));
$hasprobarinfo = (!empty($PAGE->theme->settings->probarinfo));
$hasemailurl = (!empty($PAGE->theme->settings->emailurl));
$hasfacebook = (!empty($PAGE->theme->settings->facebook));
$hastwitter = (!empty($PAGE->theme->settings->twitter));
$hasgoogleplus = (!empty($PAGE->theme->settings->googleplus));
$hasflickr = (!empty($PAGE->theme->settings->flickr));
$haspicasa = (!empty($PAGE->theme->settings->picasa));
$hastumblr = (!empty($PAGE->theme->settings->tumblr));
$hasblogger = (!empty($PAGE->theme->settings->blogger));
$haslinkedin = (!empty($PAGE->theme->settings->linkedin));
$hasyoutube = (!empty($PAGE->theme->settings->youtube));
$hasvimeo = (!empty($PAGE->theme->settings->vimeo));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>
<div id="toggletab">
<?php include('toggletab.php'); ?>
</div>
<div id="page">
<div id="page-header">
    <?php if ($hasnavbar) { ?>
        <div class="navbar clearfix">
            <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
            <div id="ebutton"><?php if ($hasnavbar) { echo $PAGE->button; } ?></div>
        </div>
    <?php } ?>
 </div>
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">
                <div id="region-main-wrap">
                    <div id="region-main">
                        <div class="region-content">
                            <?php echo $OUTPUT->main_content(); ?>
                        </div>
                    </div>
                </div>

                <?php if ($hassidepre) { ?>
                    <div id="region-pre" class="block-region">
                        <div class="region-content">
                            <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if ($hassidepost) { ?>
                    <div id="region-post" class="block-region">
                        <div class="region-content">
                            <?php echo $OUTPUT->blocks_for_region('side-post') ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div><!-- END OF CONTENT -->
<?php if ($hasfooter) { ?>
<div id="page-footer">
    <div id="footerwrapper">
        <div id="footerinner">
        <?php include('footer.php'); ?>
        </div>
        <div id="themeorigin">
            <a href="http://moodle.org/plugins/view.php?plugin=theme_aardvark">   Original theme created by Shaun Daubney</a>  |  <a href="http://moodle.org">moodle.org</a>
        </div>
    </div>
</div>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>