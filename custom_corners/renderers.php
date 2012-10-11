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
 * Theme version info
 *
 * @package    theme
 * @subpackage custom_corners
 * @copyright  2012 Mary Evans {@link http://visible-expression.co.uk}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class theme_custom_corners_core_renderer extends core_renderer {

    /**
     * Prints a nice side block with an optional header.
     *
     * The content is described
     * by a {@link block_contents} object.
     *
     * @param block_contents $bc HTML for the content
     * @param string $region the region the block is appearing in.
     * @return string the HTML to be output.
     */
    function block($bc, $region) {

        $bc = clone($bc); // Avoid messing up the object passed in.
        if (empty($bc->blockinstanceid) || !strip_tags($bc->title)) {
            $bc->collapsible = block_contents::NOT_HIDEABLE;
        }
        if ($bc->collapsible == block_contents::HIDDEN) {
            $bc->add_class('hidden');
        }
        if (!empty($bc->controls)) {
            $bc->add_class('block_with_controls');
        }

        $skiptitle = strip_tags($bc->title);
        if (empty($skiptitle)) {
            $output = '';
            $skipdest = '';
        } else {
            $output = html_writer::tag('a', get_string('skipa', 'access', $skiptitle), array('href' => '#sb-' . $bc->skipid, 'class' => 'skip-block'));
            $skipdest = html_writer::tag('span', '', array('id' => 'sb-' . $bc->skipid, 'class' => 'skip-block-to'));
        }

        $output .= html_writer::start_tag('div', $bc->attributes);

        /** Rounded corners **/
        $output .= html_writer::start_tag('div', array('class'=>'btr'));
        $output .= html_writer::start_tag('div', array('class'=>'btl'));
        $output .= html_writer::end_tag('div');
        $output .= html_writer::end_tag('div');
        $output .= html_writer::start_tag('div', array('class'=>'i1'));
        $output .= html_writer::start_tag('div', array('class'=>'i2'));
        $output .= html_writer::start_tag('div', array('class'=>'i3 clrfix'));
        $controlshtml = $this->block_controls($bc->controls);

        $title = '';
        if ($bc->title) {
            $title = html_writer::tag('h2', $bc->title);
        }

        if ($title || $controlshtml) {
            $output .= html_writer::tag('div', html_writer::tag('div', html_writer::tag('div', '', array('class'=>'block_action')). $title . $controlshtml, array('class' => 'title')), array('class' => 'header'));
        }

        $output .= html_writer::start_tag('div', array('class' => 'content'));
        if (!$title && !$controlshtml) {
            $output .= html_writer::tag('div', '', array('class'=>'block_action notitle'));
        }
        $output .= $bc->content;

        if ($bc->footer) {
            $output .= html_writer::tag('div', $bc->footer, array('class' => 'footer'));
        }

        $output .= html_writer::end_tag('div');

                /** Four rounded corner ends **/
        $output .= html_writer::end_tag('div');
        $output .= html_writer::end_tag('div');
        $output .= html_writer::end_tag('div');
        $output .= html_writer::start_tag('div', array('class'=>'bbr'));
        $output .= html_writer::start_tag('div', array('class'=>'bbl'));
        $output .= html_writer::end_tag('div');
        $output .= html_writer::end_tag('div');

        $output .= html_writer::end_tag('div');

        if ($bc->annotation) {
            $output .= html_writer::tag('div', $bc->annotation, array('class' => 'blockannotation'));
        }
        $output .= $skipdest;

        $this->init_block_hider_js($bc);

        return $output;
    }

}
