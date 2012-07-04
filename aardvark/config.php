<?php

$THEME->name = 'aardvark';

////////////////////////////////////////////////////
// Name of the theme. Most likely the name of
// the directory in which this file resides.
////////////////////////////////////////////////////

$THEME->parents = array('canvas', 'base');

/////////////////////////////////////////////////////
// Which existing theme(s) in the /theme/ directory
// do you want this theme to extend. A theme can
// extend any number of themes. Rather than
// creating an entirely new theme and copying all
// of the CSS, you can simply create a new theme,
// extend the theme you like and just add the
// changes you want to your theme.
////////////////////////////////////////////////////

$THEME->sheets = array(
    'pagelayout',
    'core',
    'blocks',
    'menuwrap',
    'yuimenu',
    'calendar',
    'forum',
    'general',
    'dock',
    'settings',
 );

////////////////////////////////////////////////////
// Name of the stylesheet(s) you've including in
// this theme's /styles/ directory.
////////////////////////////////////////////////////

$THEME->parents_exclude_sheets = array(
    'base'=>array(
        'pagelayout',
  ),
    'canvas'=>array(
        'pagelayout',
  )
);

////////////////////////////////////////////////////
// Name of the stylesheet(s) you've excluded from
// parent theme /styles/ directory.
////////////////////////////////////////////////////

$THEME->enable_dock = true;

////////////////////////////////////////////////////
// Do you want to use the new navigation dock?
////////////////////////////////////////////////////

$THEME->editor_sheets = array('editor');

////////////////////////////////////////////////////
// An array of stylesheets to include within the
// body of the editor.
////////////////////////////////////////////////////

$THEME->layouts = array(
    // Most backwards compatible layout without the blocks - this is the layout used by default
    'base' => array(
        'file' => 'default.php',
        'regions' => array(),
    ),
    // Standard layout with blocks, this is recommended for most pages with general information
    'standard' => array(
        'file' => 'default.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    // Main course page
    'course' => array(
        'file' => 'default.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu'=>true),
    ),
    'coursecategory' => array(
        'file' => 'default.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    // part of course, typical for modules - default page layout if $cm specified in require_login()
    'incourse' => array(
        'file' => 'default.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'default.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'default.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // My dashboard page
    'mydashboard' => array(
        'file' => 'default.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu'=>true),
    ),
    // My public page
    'mypublic' => array(
        'file' => 'default.php',
        'regions' => array('side-pre', 'side-post'),
        'defaultregion' => 'side-pre',
    ),
    'login' => array(
        'file' => 'default.php',
        'regions' => array(),
        'options' => array('langmenu'=>true),
    ),

    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => array(
        'file' => 'default.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true, 'nologininfo'=>true),
    ),
    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => array(
        'file' => 'default.php',
        'regions' => array(),
        'options' => array('nofooter'=>true),
    ),
    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true),
    ),
    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, and it is good idea if it does not have links to
    // other places - for example there should not be a home link in the footer...
    'maintenance' => array(
        'file' => 'default.php',
        'regions' => array(),
        'options' => array('noblocks'=>true, 'nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true),
    ),
    // Should display the content and basic headers only.
    'print' => array(
        'file' => 'default.php',
        'regions' => array(),
        'options' => array('noblocks'=>true, 'nofooter'=>true, 'nonavbar'=>false, 'nocustommenu'=>true),
    ),
    // The pagelayout used when a redirection is occuring.
    'redirect' => array(
        'file' => 'embedded.php',
        'regions' => array(),
        'options' => array('nofooter'=>true, 'nonavbar'=>true, 'nocustommenu'=>true),
    ),
    // The pagelayout used for reports
    'report' => array(
        'file' => 'default.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
);


$THEME->csspostprocess = 'aardvark_process_css';

$THEME->javascripts = array('toggle5');