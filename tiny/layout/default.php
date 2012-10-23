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
 * Layout for Moodle's tiny theme.
 *
 * @package   theme
 * @copyright 2012 Mary Evans
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasheader = (empty($PAGE->layout_options['noheader']));
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));
$haslogininfo = (empty($PAGE->layout_options['nologininfo']));
$hasfootnote = (!empty($PAGE->theme->settings->footnote));
$haslogo = (!empty($PAGE->theme->settings->logo));

$showsidepre = ($hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT));
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu($PAGE->theme->settings->custommenuitems);
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));


$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($showsidepost && !$showsidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($haslogo) {
    $bodyclasses[] = 'has-logo';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta charset="utf-8" />
     <!-- Le Google font -->
    <link href='http://fonts.googleapis.com/css?family=Eagle+Lake&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('ico/favicon', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $OUTPUT->pix_url('ico/apple-touch-icon-144-precomposed', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $OUTPUT->pix_url('ico/apple-touch-icon-114-precomposed', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $OUTPUT->pix_url('ico/apple-touch-icon-72-precomposed', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" href="<?php echo $OUTPUT->pix_url('ico/apple-touch-icon-57-precomposed', 'theme'); ?>" />


    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">

<?php echo $OUTPUT->standard_top_of_body_html() ?>

    <div class="tiny-navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="logo" href="<?php echo $CFG->wwwroot; ?>"></a>
          <div class="nav-collapse collapse">
          <?php echo $custommenu; ?>

              <?php
            if (isloggedin()) { ?>
                <li class="dropdown">
                <a href="<?php echo $CFG->wwwroot.'/user/view.php?id='.$USER->id.'&amp;course='.$COURSE->id;?>" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> <?php echo $USER->firstname.'&nbsp;'.$USER->lastname; ?>&nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $CFG->wwwroot ?>/my/"><i class="icon-tasks"></i>
                        <?php echo get_string('mycourses'); ?></a></li>
                        <li><a href="#"><i class="icon-briefcase"></i> My private files</a></li>
                        <li><a href="#"><i class="icon-edit"></i> Edit my profile</a></li>
                        <li class="lang-menu"><?php echo $OUTPUT->lang_menu(); ?></li>
                    </ul>
                </li>
            <?php
        } else { ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i> <?php echo get_string('language'); ?>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu lang-menu">
                  <li class="lang-menu"><?php echo $OUTPUT->lang_menu(); ?></li>
                </ul>
              </li>
            <?php } ?>
            </ul>
            <?php include('loginout.php'); ?>


         </div><!--/.nav-collapse -->
        </div>
      </div>
    </div> <!-- /container-fluid (1) -->

<!-- container fluid (2) -->
<div class="container-fluid">

<?php include('header.php'); ?>

<!-- navbar - breadcrumb -->

<?php if ($hasnavbar) { ?>
    <div class="navbar clearfix">
        <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
        <div class="navbutton"> <?php echo $PAGE->button; ?></div>
    </div>
<?php } ?>

<!-- row 1 - main-content -->

 <div class="tiny-row-fluid">

    <?php if ($hassidepre) { ?>
    <div class="span3 left">
    <div id="region-pre" class="block-region">
    <div class="region-content">
        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
    </div>
    </div>
    </div>
    <?php } ?>

    <div class="span6">
        <?php echo $OUTPUT->main_content(); ?>
    </div>

    <?php if ($hassidepost) { ?>
    <div class="span3 right">
    <div id="region-post" class="block-region">
    <div class="region-content">
        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
    </div>
    </div>
    </div>
    <?php } ?>

</div>
<!-- end row 1 -->

<hr>

<!-- START OF FOOTER -->
    <?php if ($hasfooter) { ?>
    <div id="page-footer">
        <footer>
        <?php if ($hasfootnote) { ?>
            <div id="footnote"><?php echo $PAGE->theme->settings->footnote;?></div>
        <?php } ?>
        </footer>


        <?php echo $OUTPUT->home_link(); ?>
        <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>

        <?php echo $OUTPUT->standard_footer_html(); ?>

    </div>
    <?php } ?>


</div> <!-- /container fluid (2)-->

<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>