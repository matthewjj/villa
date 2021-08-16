<?php

namespace App\Loaders\Calendar;

use App\Loaders\Database;
use App\Models\Calendar\Calendar;
use DB;

class CalendarLoader extends Database
{
    public function __construct() {
        parent::__construct(new Calendar());
    }

    public function main($cols, $conditions = []) {

        $select = implode(',', $cols);

        $query = DB::table('_calendar as c')
            ->leftJoin('_properties as p', 'c.c_p_aid', '=', 'p.p_aid');

        foreach($conditions as $column => $value) {
            $query->where($column, '=', $value);
        }

        return $query->selectRaw($select)->get();
    }

}
