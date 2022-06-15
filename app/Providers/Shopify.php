<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\ShopifyApi\DeleteJson;
use App\ShopifyApi\PostJson;
use App\ShopifyApi\PutJson;
use App\ShopifyApi\GetJson;
use PHPUnit\Util\Getopt;
use Illuminate\Support\Facades\Config;
use App\Models\GoogleApi;
use App\Models\ShopifyApi;
use Exception;


class Shopify extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */


    public function register()
    {
        $this->app->bind("Shopify", function() {
            return  new GetJson;
        });

        $this->app->bind("Shopifyt", function() {
            return  new DeleteJson;
        });

        $this->app->bind("ShopifyCreate", function() {
            return  new PostJson;
        });

        $this->app->bind("ShopifyEdit", function() {
            return  new PutJson;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

       $this->chooseShopItem();

       $this->AnalyticsConfig();

    }

    public function chooseShopItem():void{

        $shopifyApiDomen = [];

        try {
                $domen = ShopifyApi::select('SHOPIFY_DOMAIN')->get();

                foreach ($domen as $key => $value) {
                       array_push($shopifyApiDomen,$value->SHOPIFY_DOMAIN);
                }

          }
        catch (Exception $e) {
            echo "ShopifyApi not exists"."\n";
        }

        view()->composer('*', function ($view) use ($shopifyApiDomen){
            $view->with('admin.inc.headerBar')->with([
                "shopifyApiDomen" => $shopifyApiDomen
            ]);
        });

    }

    public function AnalyticsConfig():void{

                 GoogleApi::googleConfigSet();
    }

}
