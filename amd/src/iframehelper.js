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
 * Detects whether the current page is being viewed in an iframe and hides
 * certain elements to improve the display within the iframe.
 *
 * @module     block_iframehelper/iframehelper
 * @copyright  2025 ISB Bayern
 * @author     Stefan Hanauska <stefan.hanauska@csg-in.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Initialize the iframe helper
 *
 * @param {*} hideselectors
 * @param {*} nopaddingselectors
 * @returns {void}
 */
export const init = (hideselectors, nopaddingselectors) => {
    const inIframe = window.self !== window.top;
    if (!inIframe) {
        return;
    }
    hideselectors.forEach((s) => {
        const els = window.self.document.querySelectorAll(s);
        els.forEach((el) => {
            el.classList.add('block_iframehelper-hidden');
        });
    });
    nopaddingselectors = ['#page', '#topofscroll'];
    nopaddingselectors.forEach((s) => {
        const els = window.self.document.querySelectorAll(s);
        els.forEach((el) => {
            el.classList.add('block_iframehelper-nopadding');
        });
    });
};
