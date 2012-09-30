<?php

class theme_tiny_core_renderer extends core_renderer {

    /**
     * The standard tags (typically performance information and validation links,
     * if we are in developer debug mode) that should be output in the footer area
     * of the page. Designed to be called in theme layout.php files.
     *
     * @return string HTML fragment.
     */
    public function standard_footer_html() {
        global $CFG, $SCRIPT;

        // This function is normally called from a layout.php file in {@link core_renderer::header()}
        // but some of the content won't be known until later, so we return a placeholder
        // for now. This will be replaced with the real content in {@link core_renderer::footer()}.
        $output = $this->unique_performance_info_token;
        if ($this->page->devicetypeinuse == 'legacy') {
            // The legacy theme is in use print the notification
            $output .= html_writer::tag('div', get_string('legacythemeinuse'), array('class'=>'legacythemeinuse'));
        }

        // Get links to switch device types (only shown for users not on a default device)
        $output .= $this->theme_switch_links();

        if (!empty($CFG->debugpageinfo)) {
            $output .= '<div class="performanceinfo pageinfo">This page is: ' . $this->page->debug_summary() . '</div>';
        }
        if (debugging(null, DEBUG_DEVELOPER) and has_capability('moodle/site:config', context_system::instance())) {  // Only in developer mode
            // Add link to profiling report if necessary
            if (function_exists('profiling_is_running') && profiling_is_running()) {
                $txt = get_string('profiledscript', 'admin');
                $title = get_string('profiledscriptview', 'admin');
                $url = $CFG->wwwroot . '/admin/tool/profiling/index.php?script=' . urlencode($SCRIPT);
                $link= '<a title="' . $title . '" href="' . $url . '">' . $txt . '</a>';
                $output .= '<div class="profilingfooter">' . $link . '</div>';
            }
            $output .= '<div class="purgecaches"><a class="btn btn-small" href="'.$CFG->wwwroot.'/'.$CFG->admin.'/purgecaches.php?confirm=1&amp;sesskey='.sesskey().'"><i class="icon-trash"></i>&nbsp;&nbsp;'.get_string('purgecaches', 'admin').'</a></div>';
        }
        if (!empty($CFG->debugvalidators)) {
            // NOTE: this is not a nice hack, $PAGE->url is not always accurate and $FULLME neither, it is not a bug if it fails. --skodak
            $output .= '<div class="validators"><ul class="nav nav-pills">
              <li><a href="http://validator.w3.org/check?verbose=1&amp;ss=1&amp;uri=' . urlencode(qualified_me()) . '">Validate HTML</a></li>
              <li><a href="http://www.contentquality.com/mynewtester/cynthia.exe?rptmode=-1&amp;url1=' . urlencode(qualified_me()) . '">Section 508 Check</a></li>
              <li><a href="http://www.contentquality.com/mynewtester/cynthia.exe?rptmode=0&amp;warnp2n3e=1&amp;url1=' . urlencode(qualified_me()) . '">WCAG 1 (2,3) Check</a></li>
            </ul></div>';
        }
        if (!empty($CFG->additionalhtmlfooter)) {
            $output .= "\n".$CFG->additionalhtmlfooter;
        }
        return $output;
    }

        /**
         * Return the 'back' link that normally appears in the footer.
         *
         * @return string HTML fragment.
         */
        public function home_link() {
            global $CFG, $SITE;

            if ($this->page->pagetype == 'site-index') {
                // Special case for site home page - please do not remove
                return '<div class="sitelink">' .
                       '<a title="Moodle" href="http://moodle.org/">' .
                       '<img style="width:100px;height:30px" src="' . $this->pix_url('moodlelogo') . '" alt="moodlelogo" /></a></div>';

            } else if (!empty($CFG->target_release) && $CFG->target_release != $CFG->release) {
                // Special case for during install/upgrade.
                return '<div class="sitelink">'.
                       '<a title="Moodle" href="http://docs.moodle.org/en/Administrator_documentation" onclick="this.target=\'_blank\'">' .
                       '<img style="width:100px;height:30px" src="' . $this->pix_url('moodlelogo') . '" alt="moodlelogo" /></a></div>';

            } else if ($this->page->course->id == $SITE->id || strpos($this->page->pagetype, 'course-view') === 0) {
                return '<div class="homelink"><a class="btn btn-small" href="' . $CFG->wwwroot . '/"><i class="icon-home"></i>&nbsp;&nbsp;' .
                        get_string('home') . '</a></div>';

            } else {
                return '<div class="homelink"><a href="' . $CFG->wwwroot . '/course/view.php?id=' . $this->page->course->id . '">' .
                        format_string($this->page->course->shortname, true, array('context' => $this->page->context)) . '</a></div>';
            }
        }

    /**
     * Return the standard string that says whether you are logged in (and switched
     * roles/logged in as another user).
     * @param bool $withlinks if false, then don't include any links in the HTML produced.
     * If not set, the default is the nologinlinks option from the theme config.php file,
     * and if that is not set, then links are included.
     * @return string HTML fragment.
     */
    public function login_info($withlinks = null) {
        global $USER, $CFG, $DB, $SESSION;

        if (during_initial_install()) {
            return '';
        }

        if (is_null($withlinks)) {
            $withlinks = empty($this->page->layout_options['nologinlinks']);
        }

        $loginpage = ((string)$this->page->url === get_login_url());
        $course = $this->page->course;
        if (session_is_loggedinas()) {
            $realuser = session_get_realuser();
            $fullname = fullname($realuser, true);
            if ($withlinks) {
                $realuserinfo = " [<a href=\"$CFG->wwwroot/course/loginas.php?id=$course->id&amp;sesskey=".sesskey()."\">$fullname</a>] ";
            } else {
                $realuserinfo = " [$fullname] ";
            }
        } else {
            $realuserinfo = '';
        }

        $loginurl = get_login_url();

        if (empty($course->id)) {
            // $course->id is not defined during installation
            return '';
        } else if (isloggedin()) {
            $context = context_course::instance($course->id);

            $fullname = fullname($USER, true);
            // Since Moodle 2.0 this link always goes to the public profile page (not the course profile page)
            if ($withlinks) {
                $username = "<a href=\"$CFG->wwwroot/user/profile.php?id=$USER->id\">$fullname</a>";
            } else {
                $username = $fullname;
            }
            if (is_mnet_remote_user($USER) and $idprovider = $DB->get_record('mnet_host', array('id'=>$USER->mnethostid))) {
                if ($withlinks) {
                    $username .= " from <a href=\"{$idprovider->wwwroot}\">{$idprovider->name}</a>";
                } else {
                    $username .= " from {$idprovider->name}";
                }
            }
            if (isguestuser()) {
                $loggedinas = $realuserinfo.get_string('loggedinasguest');
                if (!$loginpage && $withlinks) {
                    $loggedinas .= " <a class=\"btn btn-small btn-primary\" href=\"$loginurl\"><i class=\"icon-hand-right icon-white\"></i>&nbsp;&nbsp;".get_string('login').'</a>';
                }
            } else if (is_role_switched($course->id)) { // Has switched roles
                $rolename = '';
                if ($role = $DB->get_record('role', array('id'=>$USER->access['rsw'][$context->path]))) {
                    $rolename = ': '.format_string($role->name);
                }
                $loggedinas = get_string('loggedinas', 'moodle', $username).$rolename;
                if ($withlinks) {
                    $loggedinas .= " (<a href=\"$CFG->wwwroot/course/view.php?id=$course->id&amp;switchrole=0&amp;sesskey=".sesskey()."\">".get_string('switchrolereturn').'</a>)';
                }
            } else {
                $loggedinas = $realuserinfo.get_string('loggedinas', 'moodle', $username);
                if ($withlinks) {
                    $loggedinas .= '&nbsp;&nbsp;<a class="btn btn-small" href="$CFG->wwwroot/login/logout.php?sesskey='.sesskey().'">'.get_string('logout').'&nbsp;&nbsp;<i class="icon-hand-left"></i></a>';
                }
            }
        } else {
            $loggedinas = get_string('loggedinnot', 'moodle');
            if (!$loginpage && $withlinks) {
                $loggedinas .= " <a class=\"btn btn-small btn-primary\" href=\"$loginurl\"><i class=\"icon-hand-right icon-white\"></i>&nbsp;&nbsp;".get_string('login').'</a>';
            }
        }

        $loggedinas = '<div class="logininfo">'.$loggedinas.'</div>';

        if (isset($SESSION->justloggedin)) {
            unset($SESSION->justloggedin);
            if (!empty($CFG->displayloginfailures)) {
                if (!isguestuser()) {
                    if ($count = count_login_failures($CFG->displayloginfailures, $USER->username, $USER->lastlogin)) {
                        $loggedinas .= '&nbsp;<div class="loginfailures">';
                        if (empty($count->accounts)) {
                            $loggedinas .= get_string('failedloginattempts', '', $count);
                        } else {
                            $loggedinas .= get_string('failedloginattemptsall', '', $count);
                        }
                        if (file_exists("$CFG->dirroot/report/log/index.php") and has_capability('report/log:view', context_system::instance())) {
                            $loggedinas .= ' <a href="'.$CFG->wwwroot.'/report/log/index.php'.
                                                 '?chooselog=1&amp;id=1&amp;modid=site_errors">'.get_string('logs').'</a>';
                        }
                        $loggedinas .= '</div>';
                    }
                }
            }
        }

        return $loggedinas;
    }

}
