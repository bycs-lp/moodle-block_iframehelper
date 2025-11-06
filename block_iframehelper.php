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
 * Block Iframe helper
 *
 * Documentation: {@link https://moodledev.io/docs/apis/plugintypes/blocks}
 *
 * @package    block_iframehelper
 * @copyright  2025 ISB Bayern
 * @author     Stefan Hanauska <stefan.hanauska@csg-in.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_iframehelper extends block_base {
    /**
     * Block initialisation
     */
    public function init() {
        $this->title = get_string('pluginname', 'block_iframehelper');
    }

    /**
     * Get content
     *
     * @return stdClass
     */
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = (object)[
            'footer' => '',
            'text' => '',
        ];
        return $this->content;
    }

    /**
     * Load required javascript
     */
    public function get_required_javascript() {
        $hideselectors = get_config('block_iframehelper', 'hidefreeselectors');
        $hideselectors = array_map('trim', explode("\n", $hideselectors));
        $hideselectors = array_filter($hideselectors, function ($value) {
            return $value != '';
        });
        $nopaddingselectors = get_config('block_iframehelper', 'nopaddingselectors');
        $nopaddingselectors = array_map('trim', explode("\n", $nopaddingselectors));
        $nopaddingselectors = array_filter($nopaddingselectors, function ($value) {
            return $value != '';
        });
        $this->page->requires->js_call_amd('block_iframehelper/iframehelper', 'init', [$hideselectors, $nopaddingselectors]);
    }

    /**
     * No configuration for this block
     *
     * @return bool
     */
    public function has_config() {
        return true;
    }

    /**
     * Run at creation time. This block should be visible on all pages in a course by default.
     */
    public function instance_create() {
        global $DB;
        if ($this->context->get_parent_context()->contextlevel === CONTEXT_COURSE) {
            $DB->update_record('block_instances', ['id' => $this->instance->id, 'pagetypepattern' => '*']);
        }
        return true;
    }
}
