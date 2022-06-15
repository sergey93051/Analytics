<?php

namespace App\Http\Controllers\Admin\Shopify\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopifyApi;
use App\Models\GoogleApi;
use App\Models\ApiChoose;

class ApiChooseController extends Controller
{
    public function shopifyApi(Request $request)
    {
        session()->put("input", $request->shopifyDomen);

         $this->shopifyApichange($request);

         return redirect()->route('home');
    }

    public function shopifyApichange($request): void
    {

        $getDomen = ShopifyApi::change($request);

                    ApiChoose::createds($getDomen);

    }
}
