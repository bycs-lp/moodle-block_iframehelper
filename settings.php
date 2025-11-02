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
 * Admin settings for block_iframehelper
 *
 * @package    block_iframehelper
 * @copyright  2025 ISB Bayern
 * @author     Stefan Hanauska <stefan.hanauska@csg-in.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $hideselectorsdefault = [
        'nav.fixed-top',
        'header',
        '#nav-drawer',
        '#group_menu',
        'blocks-column',
        '.activity-navigation',
        '.drawer-left-toggle',
        '.drawer-right-toggle',
        'footer',
        '.secondary-navigation',
        '.drawer',
        'bycs-topbar',
        '.mbscontentheader',
        '.block_ai_chat',
    ];

    $nopaddingselectorsdefault = [
        '#page',
        '#topofscroll',
    ];

    $settings->add(new admin_setting_configtextarea(
        'block_iframehelper/hidefreeselectors',
        get_string('hideselectors', 'block_iframehelper'),
        get_string('hideselectors_desc', 'block_iframehelper'),
        implode("\n", $hideselectorsdefault),
        PARAM_TEXT
    ));
    $settings->add(new admin_setting_configtextarea(
        'block_iframehelper/nopaddingselectors',
        get_string('nopaddingselectors', 'block_iframehelper'),
        get_string('nopaddingselectors_desc', 'block_iframehelper'),
        implode("\n", $nopaddingselectorsdefault),
        PARAM_TEXT
    ));
}
