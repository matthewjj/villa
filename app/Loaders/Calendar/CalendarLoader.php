<?php

namespace App\Loaders\Calendar;

use App\Loaders\Database;
use App\Models\Calendar\Calendar;

class CalendarLoader extends Database
{
    public function __construct() {
        parent::__construct(new Calendar());
    }

    public function byPropertyID($id, $exportID = null) {
        $dates = Calendar::leftJoin('_properties as p', '_calendar.c_p_aid', '=', 'p.p_aid')
            ->where('p.p_aid', $id);

        if($exportID) {
            $dates->where('p.p_ical_export_id', $exportID);

        }

        return $dates->get();
    }

}
