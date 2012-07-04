<div class="footer_block">

    <?php
    if ($hascopyright) { ?>
        <h4>&copy;
        <?php
        echo date("Y"). '&bull;' . $PAGE->theme->settings->copyright;
} ?></h4>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->standard_footer_html();
        ?>
</div>

<div class="footer_block">

    <?php
    if ($hasdisclaimer) { ?>
        <h4><?php echo get_string('disclaimer','theme_aardvark');?></h4>
        <?php echo $PAGE->theme->settings->disclaimer;
} ?>

</div>

<div class="footersocial" id="footersocial">
<h4><?php echo get_string('socialnetwork', 'theme_aardvark'); ?></h4>

    <ul id="neticons">
    <?php
    if ($hasfacebook) {?>
        <li><a href="<?php echo $PAGE->theme->settings->facebook;?> ">
        <img src="<?php echo $OUTPUT->pix_url('social/facebook', 'theme')?>" />
        </a></li>
        <?php
}?>

    <?php
    if ($hastwitter) {?>
        <li><a href="<?php echo $PAGE->theme->settings->twitter;?> ">
        <img src="<?php echo $OUTPUT->pix_url('social/twitter', 'theme')?>" />
        </a></li>
        <?php
}?>

    <?php
    if ($hasgoogleplus) {?>
        <li><a href="<?php echo $PAGE->theme->settings->googleplus;?> "><img src="<?php echo $OUTPUT->pix_url('social/googleplus', 'theme')?>" />
        </a></li>
        <?php
}?>

    <?php
    if ($hasflickr) {?>
        <li><a href="<?php echo $PAGE->theme->settings->flickr;?> "><img src="<?php echo $OUTPUT->pix_url('social/flickr', 'theme')?>" />
        </a></li>
        <?php
}?>

    <?php
    if ($haspicasa) {?>
        <li><a href="<?php echo $PAGE->theme->settings->picasa;?> "><img src="<?php echo $OUTPUT->pix_url('social/picasa', 'theme')?>" />
        </a></li>
        <?php
}?>

    <?php
    if ($hastumblr) {?>
        <li><a href="<?php echo $PAGE->theme->settings->tumblr;?> "><img src="<?php echo $OUTPUT->pix_url('social/tumblr', 'theme')?>" />
        </a></li>
    <?php
}?>

    <?php
    if ($hasblogger) {?>
        <li><a href="<?php echo $PAGE->theme->settings->blogger;?> "><img src="<?php echo $OUTPUT->pix_url('social/blogger', 'theme')?>" />
        </a></li>
        <?php
}?>

    <?php
    if ($haslinkedin) {?>
        <li><a href="<?php echo $PAGE->theme->settings->linkedin;?> "><img src="<?php echo $OUTPUT->pix_url('social/linkedin', 'theme')?>" />
        </a></li>
        <?php
}?>

    <?php
    if ($hasyoutube) {?>
        <li><a href="<?php echo $PAGE->theme->settings->youtube;?> "><img src="<?php echo $OUTPUT->pix_url('social/youtube', 'theme')?>" />
        </a></li>
        <?php
}?>

    <?php
    if ($hasvimeo) {?>
        <li><a href="<?php echo $PAGE->theme->settings->vimeo;?> "><img src="<?php echo $OUTPUT->pix_url('social/vimeo', 'theme')?>" />
        </a></li>
        <?php
}?>
    </ul>
</div>