<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;


class ShopifyEdit extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "ShopifyEdit";
    }
}
