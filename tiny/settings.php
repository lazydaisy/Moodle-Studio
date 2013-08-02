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
 * Renderers file.
 *
 * @package   theme
 * @copyright 2013 Mary Evans
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Font-Face setting.
    $name = 'theme_tiny/fontface';
    $title = get_string('fontface', 'theme_tiny');
    $description = get_string('fontfacedesc', 'theme_tiny');
    $default = 'Tempus Sans ITC';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);

    // Tiny Navbar (Background brand icon).
    $name = 'theme_tiny/brandicon';
    $title=get_string('brandicon', 'theme_tiny');
    $description = get_string('brandicondesc', 'theme_tiny');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $settings->add($setting);

    // Custom CSS file.
    $name = 'theme_tiny/customcss';
    $title = get_string('customcss', 'theme_tiny');
    $description = get_string('customcssdesc', 'theme_tiny');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

    // Welcome note setting.
    $name = 'theme_tiny/welcomenote';
    $title = get_string('welcomenote', 'theme_tiny');
    $description = get_string('welcomenotedesc', 'theme_tiny');
    $default = get_string('welcomenotetxt', 'theme_tiny');
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $settings->add($setting);

    // Footnote setting.
    $name = 'theme_tiny/footnote';
    $title = get_string('footnote', 'theme_tiny');
    $description = get_string('footnotedesc', 'theme_tiny');
    $default = get_string('footnotetxt', 'theme_tiny');
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $settings->add($setting);

    // Theme override of custommenu items.
    $name = 'theme_tiny/custommenuitems';
    $title = get_string('custommenuitems', 'admin');
    $description = get_string('configcustommenuitems', 'admin');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

}