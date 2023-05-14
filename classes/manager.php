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

namespace local_message;

use dml_exception;
use stdClass;

defined('MOODLE_INTERNAL') || die();

class manager
{

    /** Insert the form data into our database table.
     * @param string $message_text
     * @param string $message_type
     * @return bool true if successful
     */
    public function create_message(string $message_text, string $message_type): bool
    {
        global $DB;

        $record_to_insert = new stdClass();
        $record_to_insert->messagetext = $message_text;
        $record_to_insert->messagetype = $message_type;

        try {
            return $DB->insert_record('local_message', $record_to_insert, false);
        } catch (dml_exception $e) {
            return false;
        }
    }

    /** Gets all messages that have not been read by this user
     * @param int $userid the user that we are getting messages for
     * @return array of messages
     */
    public function get_messages($id): array
    {
        global $DB;

        $sql = "SELECT lm.id, lm.messagetext, lm.messagetype FROM {local_message} lm 
        LEFT OUTER JOIN {local_message_read} lmr ON lm.id = lmr.messageid 
        WHERE lmr.userid <> :userid OR lmr.userid IS NULL";

        $params = [
            'userid' => $id,
        ];

        $messages = $DB->get_records_sql($sql, $params);

        return $messages;
    }
}
