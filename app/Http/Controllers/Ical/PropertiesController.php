<?php

namespace App\Http\Controllers\Ical;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Loaders\LoaderBank;

use App\Libs\Ical\Ical;

class PropertiesController extends Controller
{

    public function __construct(LoaderBank $loaderBank) {

        $this->loaderBank = $loaderBank;
    }

    public function show($exportID, $propertyID, Request $request)
    {
        $dates = $this->loaderBank->calendarLoader->byPropertyID($propertyID, $exportID);

        $icaltemplate = Ical::icalTemplate();
        $outputRows = '';

        foreach($dates->toArray() as $date) {
            $outputRows = $outputRows. Ical::createRow($date);

        }

        $icalTemplate = str_replace("[!ICAL_ROWS!]", $outputRows, $icaltemplate);

        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: download; filename=calendar.ics');

        echo $icalTemplate;

        return;

    }

}
