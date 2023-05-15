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
 * Quiz external functions and service definitions.
 *
 * @package    local_message
 * @copyright  2023 Adrian Changalombo
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

$functions = [
    // The name of your web service function, as discussed above.
    'local_message_delete_message' => [
        // The name of the namespaced class that the function is located in.
        'classname'   => 'local_message_external',
        'methodname' => 'delete_message',

        //file containing the class/external function - not required if using namespaced auto-loading classes.
        // 'classpath' => 'local/message/externallib.php',

        // A brief, human-readable, description of the web service function.
        'description' => 'Delete a message',

        // Options include read, and write.
        'type' => 'write',

        // Whether the service is available for use in AJAX calls from the web.
        'ajax' => true,

        'capabilities' => '', // comma separated list of capabilities used by the function.

        // An optional list of services where the function will be included.
        'services' => [
            // A standard Moodle install includes one default service:
            // - MOODLE_OFFICIAL_MOBILE_SERVICE.
            // Specifying this service means that your function will be available for
            // use in the Moodle Mobile App.
            MOODLE_OFFICIAL_MOBILE_SERVICE,
        ]
    ],
];
