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
 * Profilebar layout file.
 *
 * @package   theme_aardvark
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 ?>

  <div id="profilename" class="profilename">
     <a href="<?php echo $CFG->wwwroot.'/user/view.php?id='.$USER->id.'&amp;course='.$COURSE->id;?>"><?php echo $USER->firstname; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a id="imageDivLink" href="javascript:toggle5('profilebar', 'imageDivLink');">&#9660;</a>&nbsp;&nbsp;&nbsp;&nbsp;
 </div>

<div class="profilebar" id="profilebar" style="display: none;">
    <div class="profilebar_block">
    <h4><?php echo get_string('information', 'theme_aardvark'); ?></h4>
    <?php
if ($hasprobarinfo) {
    echo $PAGE->theme->settings->probarinfo;
} ?>
</div>

<div class="profilebar_events">
    <h4><?php echo get_string('upcomingevents','calendar');?></h4>
    <?php include ('upcoming.php');?>
</div>

<div class="profilebar_account">
<h4><?php echo get_string('mymoodle', 'my');?></h4>
    <div class="profileoptions" id="profileoptions">
        <table width="100%" border="0">
        <tr>
        <td valign="top"><ul>
        <li><a href="<?php echo $CFG->wwwroot; ?>/my">
        <img src="<?php echo $OUTPUT->pix_url('profile/courses', 'theme')?>" />&nbsp;<?php echo get_string('mycourses');?></a></li>
        <li><a href="<?php echo $CFG->wwwroot; ?>/user/profile.php">
        <img src="<?php echo $OUTPUT->pix_url('profile/profile', 'theme')?>" />&nbsp;<?php echo get_string('viewprofile');?></a></li>
        <li><a href="<?php echo $CFG->wwwroot; ?>/user/editadvanced.php"><img src="<?php echo $OUTPUT->pix_url('profile/editprofile', 'theme')?>" />&nbsp;<?php echo get_string('editmyprofile');?></a></li>
        <li><a href="<?php echo $CFG->wwwroot; ?>/user/files.php"><img src="<?php echo $OUTPUT->pix_url('profile/myfiles', 'theme')?>" />&nbsp;<?php echo get_string('myfiles');?></a></li>
        </ul></td>
        <td valign="top"><ul>
        <li><a href="<?php echo $CFG->wwwroot; ?>/calendar/view.php?view=month"><img src="<?php echo $OUTPUT->pix_url('profile/calendar', 'theme')?>" />&nbsp;<?php echo get_string('calendar','calendar');?></a></li>

        <?php if ($hasemailurl) {?>
        <li><a href="<?php echo $PAGE->theme->settings->emailurl;?> "><img src="<?php echo $OUTPUT->pix_url('profile/email', 'theme')?>" />&nbsp;<?php echo get_string('email','theme_aardvark');?></a></li>
        <?php } else {}?>

        <li><a href="<?php echo $CFG->wwwroot; ?>/login/logout.php"><img src="<?php echo $OUTPUT->pix_url('profile/logout', 'theme')?>" />&nbsp;<?php echo get_string('logout');?></a></li>
        </ul></td>
        </tr>
        </table>
    </div>
</div>
<div class="profilebarclear"></div>
