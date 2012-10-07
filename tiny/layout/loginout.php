<?php

    function get_content () {
    global $USER, $CFG, $SESSION, $COURSE;
    $wwwroot = '';
    $signup = '';
}

    if (empty($CFG->loginhttps)) {
        $wwwroot = $CFG->wwwroot;
    } else {
        $wwwroot = str_replace('http://', 'https://', $CFG->wwwroot);
}

    if (!isloggedin() or isguestuser()) {
    echo '<form id="login" class="navbar-form pull-right" method="post" action="'.$wwwroot.'/login/index.php?authldap_skipntlmsso=1">';

    echo '<input class="loginform span2" type="text" name="username" id="login_username" value="" placeholder="'.get_string('username').'" />';
    echo '<input class="loginform span2" type="password" name="password" id="login_password" value="" placeholder="'.get_string('password').'" />';
    echo '<button type="submit" class="btn">'.get_string('login').'</button>';
    echo '</form>';
    } else {
    echo '<a href="'.$CFG->wwwroot.'/login/logout.php?sesskey='. sesskey().'"><button type="submit" class="btn btn-small btn-primary pull-right">'.get_string('logout').'&nbsp;&nbsp;<i class="icon-hand-left icon-white"></i></button></a>';
} ?>