<?php

    function aaradyha_process_css($css, $theme) {

    // Set custom CSS...
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = aaradyha_set_customcss($css, $customcss);

    return $css;
}

    function aaradyha_set_customcss($css, $customcss) {
        $tag = '[[setting:customcss]]';
        $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
        }

        $css = str_replace($tag, $replacement, $css);

        return $css;
}
