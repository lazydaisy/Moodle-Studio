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
 * Menulogin layout file.
 *
 * @package   theme_aardvark
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
?>
<div id="menuwrap">
    <div id="homeicon">
        <a href="<?php echo $CFG->wwwroot; ?>" class="homeiconlink">
        <?php
    if ($haslogo) { ?>
        <img src="<?php echo $PAGE->theme->settings->logo;?>" alt="<?php echo get_string('home'); ?>  title="<?php echo get_string('home'); ?>" " /></a>
        <?php
    } else { ?>
        <img src="<?php echo $OUTPUT->pix_url('logo', 'theme')?>" alt="<?php echo get_string('home'); ?>"  title="<?php echo get_string('home'); ?>" /></a>
        <?php
 } ?></div>

    <?php
    if (!isloggedin()) {
    }else if ($hascustommenu) { ?>
    <div id="menuitemswrap">
        <div id="custommenu"><?php echo $custommenu; ?></div>
    </div>

    <?php } ?>
    <?php include('menulogin.php'); ?>
    <?php
    if (isloggedin()) {
        include('profilebar.php');
    } ?>
</div>
