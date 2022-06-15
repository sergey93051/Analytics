<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\Fc;
use App\FacebookApi\Data;
use App\Models\FbApi;

use Request;

class Facebook extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Fc', function () {
            return new Data();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $fbApi = FbApi::select('FCNAME','FCACCAUNT')->get();
        $fcProfile = Fc::get("profile");
        $fcProfile = json_encode($fcProfile[0]);

        view()->composer('*', function ($view) use ($fcProfile,$fbApi){
            $view->with('admin.inc.headerBar')->with([
                "fcProfile" => json_decode($fcProfile),
                'fbApi' =>  $fbApi??""
            ]);
        });
    }
}
