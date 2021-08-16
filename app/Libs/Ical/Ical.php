<?php

namespace App\Libs\Ical;

class Ical {

	public static function dateToCal($timestamp) {

        return date('Ymd\THis\Z', strtotime($timestamp));

    }

    public static function icalTemplate() {

    	return
            "BEGIN:VCALENDAR
            VERSION:2.0
            PRODID:-SimplyOwners
            CALSCALE:GREGORIAN
            METHOD:PUBLISH
            [!ICAL_ROWS!]END:VCALENDAR";
            
    }

    public static function rowTemplate() {

    	return 
            "BEGIN:VEVENT
            UID:SimplyOwners-[!C_AID!]
            DTSTART:[!C_START_DATE!]
            DTEND:[!C_END_DATE!]
            SUMMARY:[!C_NOTES!]
            END:VEVENT
            ";

    }

    public static function createRow($date) {

    	$row_template = self::rowTemplate();

    	$row = str_replace("[!C_AID!]", $date['c_aid'], $row_template );
        $row = str_replace("[!C_START_DATE!]", Ical::dateToCal($date['c_start_date']), $row);
        $row = str_replace("[!C_END_DATE!]", Ical::dateToCal($date['c_end_date']), $row);
        $row = str_replace("[!C_NOTES!]", $date['c_notes'], $row);

        return $row;
    }
}

?>