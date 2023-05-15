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
 * @package   local_message
 * @copyright 2023, Adrian Changalombo <your@email.address>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_message\external;

use external_api;
use external_function_parameters;
use external_value;
use external_description;
use local_message\manager;

require_once($CFG->libdir . 'externallib.php');

defined('MOODLE_INTERNAL') || die();

class create_groups extends external_api
{
    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function delete_message_parameters(): external_function_parameters
    {
        return new external_function_parameters([
            'courseid' => new external_value(PARAM_INT, 'id of course'),
        ]);
    }

    /**
     * The function itself
     * @return string welcome message
     */
    public static function delete_message($messageid): string
    {
        $params = self::validate_parameters(self::delete_message_parameters(), ['messageid' => $messageid]);

        $manager = new manager();
        return $manager->delete_message($messageid);
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function delete_message_returns(): external_value
    {
        return new external_value(PARAM_INT, 'True if the message was successfully deleted');
    }
}
