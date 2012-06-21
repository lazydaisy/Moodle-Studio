<?php

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Masthead setting...
    $name = 'theme_aaradyha/masthead';
    $title = get_string('masthead','theme_aaradyha');
    $description = get_string('mastheaddesc', 'theme_aaradyha');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $settings->add($setting);

    // Custom CSS setting...
    $name = 'theme_aaradyha/customcss';
    $title = get_string('customcss','theme_aaradyha');
    $description = get_string('customcssdesc', 'theme_aaradyha');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

    // Theme overrides custom menu setting...
    $name = 'theme_aaradyha/custommenuitems';
    $title = get_string('custommenuitems', 'admin');
    $description = get_string('configcustommenuitems', 'admin');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $settings->add($setting);

    // Footnote setting...
    $name = 'theme_aaradyha/footnote';
    $title = get_string('footnote','theme_aaradyha');
    $description = get_string('footnotedesc', 'theme_aaradyha');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $settings->add($setting);





}