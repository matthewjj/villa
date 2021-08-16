<?php

namespace App\Loaders\Properties;

use App\Loaders\Database;
use App\Models\Properties\Property;

class PropertiesLoader extends Database
{
    public function __construct() {
        parent::__construct(new Property());
    }
    
    public function byID($id) {
        return Property::where('p_aid', $id)->first();
    }

}
