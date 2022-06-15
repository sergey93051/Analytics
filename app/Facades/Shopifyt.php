<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class Shopifyt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "Shopifyt";
    }
}
