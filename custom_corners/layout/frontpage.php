<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package    theme
 * @subpackage custom_corners
 * @copyright  2012 Mary Evans {@link http://visible-expression.co.uk}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

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
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
<div class="headermenu"><?php
    echo $OUTPUT->login_info();
    echo $OUTPUT->lang_menu();
    echo $PAGE->headingmenu;
?></div>

<div id="page-header">
<div class="btr">
<div class="btl">&nbsp;</div>
</div>
<div class="i1">
<div class="i2">
<div class="i3 clrfix">
<div id="logo"></div>
</div>
</div>
</div>
<div class="bbr">
<div class="bbl">&nbsp;</div>
</div>
</div>

<!-- END OF HEADER -->

<div id="page-content-wrap">
    <div id="page-content">
        <div id="region-main-box">
           <div id="region-post-box">

                <div id="region-main-wrap">
                    <div id="region-main">

                        <div class="btr">
                            <div class="btl">&nbsp;</div>
                        </div>
                        <div class="i1">
                            <div class="i2">
                                <div class="i3 clrfix">
                                    <div class="region-content">
                                    <?php echo method_exists($OUTPUT, "main_content")?$OUTPUT->main_content():core_renderer::MAIN_CONTENT_TOKEN ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bbr">
                            <div class="bbl">&nbsp;</div>
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
    </div>
    <div class="clearfix"></div>
</div>
<!-- START OF FOOTER -->

    <div id="page-footer">
        <div class="btr">
        <div class="btl">&nbsp;</div>
        </div>
        <div class="i1">
          <div class="i2">
            <div class="i3 clrfix">
                <p class="helplink">
                <?php echo page_doc_link(get_string('moodledocslink')) ?>
                </p>

                <?php echo $OUTPUT->login_info(); ?>
                <img src="<?php echo $OUTPUT->pix_url('moodlelogo')?>" alt="" />
            </div>
          </div>
        </div>
        <div class="bbr">
        <div class="bbl">&nbsp;</div>
        </div>
    <?php echo $OUTPUT->standard_footer_html();?>
    </div>
<div class="clearfix"></div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
