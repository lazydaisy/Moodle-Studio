<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

     // Custom CSS file
    $name = 'theme_custom_corners/customcss';
    $title = get_string('customcss','theme_custom_corners');
    $description = get_string('customcssdesc', 'theme_custom_corners');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

}