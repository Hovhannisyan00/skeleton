<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MetaData extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'metadata';
    }
}
