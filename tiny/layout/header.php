<!-- Main default unit for a primary marketing message or call to action -->
<div class="default-unit">

<?php if (!isloggedin() or isguestuser()) { ?>

<div id="page-header">
    <h1>Hello, world!</h1>
    <p>Welome to "The Tiny Project" a new Moodle 2.3+ theme based on a template from <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap 2.0</a>.</p>
    <p>Incorporating Google fonts and IE7 work-arounds, makes for an interesting project. So why not use it as a starting point to create something more unique...</p>
    <p><a class="btn btn-large" href="http://docs.moodle.org/23/en/Tiny_theme_for_Moodle_2.3"><i class="icon-hand-right"></i>&nbsp;&nbsp;Learn more</a></p>
</div>

<?php } else { ?>

<div id="page-header">
    <?php if ($hasheading) { ?>
    <h1 class="headermain"><?php echo $PAGE->heading ?></h1>
    <div class="headermenu"><?php
        if (!empty($PAGE->layout_options['langmenu'])) {
            echo $OUTPUT->lang_menu();
        }
        echo $PAGE->headingmenu
    ?></div><?php } ?>
</div>

<?php } ?>

</div>