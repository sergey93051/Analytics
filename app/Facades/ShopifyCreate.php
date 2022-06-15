<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class ShopifyCreate extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "ShopifyCreate";
    }
}
