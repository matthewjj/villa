<?php

namespace App\Loaders;

use App\Loaders\Properties\PropertiesLoader;
use App\Loaders\Calendar\CalendarLoader;


class LoaderBank extends Database
{
    public function __construct(PropertiesLoader $propertiesLoader, CalendarLoader $calendarLoader) {

        $this->propertiesLoader = $propertiesLoader;
        $this->calendarLoader = $calendarLoader;
        
    }
    
}
