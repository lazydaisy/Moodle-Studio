<?php

function tiny_process_css($css, $theme) {

    // Set the url for @font-face
    if (!empty($theme->settings->font)) {
        $font = $theme->settings->font;
    } else {
        $font = '';
    }
    $css = tiny_set_font($css, $font);

    // Set font-face for @font-face
    if (!empty($theme->settings->fontface)) {
        $fontface = $theme->settings->fontface;
    } else {
        $fontface = 'Mordred';

    }
    $css = tiny_set_fontface($css, $fontface);

    // Set custom CSS
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = tiny_set_customcss($css, $customcss);

    return $css;
}

function tiny_set_font($css, $font) {
    global $OUTPUT;
    $tag = '[[setting:font]]';
    $replacement = $font;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);

    return $css;
}

function tiny_set_fontface($css, $fontface) {
    global $OUTPUT;
    $tag = '[[setting:fontface]]';
    $replacement = $fontface;
    if (is_null($replacement)) {
        $replacement = 'Tempus Sans ITC';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

function tiny_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}


