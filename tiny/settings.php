<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {


    // Font file setting
    $name = 'theme_tiny/font';
    $title = get_string('font','theme_tiny');
    $description = get_string('fontdesc', 'theme_tiny');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $settings->add($setting);

    // Font-Face setting
    $name = 'theme_tiny/fontface';
    $title = get_string('fontface','theme_tiny');
    $description = get_string('fontfacedesc', 'theme_tiny');
    $default = 'Tempus Sans ITC';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $settings->add($setting);

    // Custom CSS file
    $name = 'theme_tiny/customcss';
    $title = get_string('customcss','theme_tiny');
    $description = get_string('customcssdesc', 'theme_tiny');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

    // Theme override of custommenu items
    $name = 'theme_tiny/custommenuitems';
    $title = get_string('custommenuitems', 'admin');
    $description = get_string('configcustommenuitems', 'admin');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

}