<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;
use App\Facades\Shopify;



class AdminController extends Controller
{
    public function index()
    {
        $checkoutsData = Shopify::getJson("checkouts");

        $checkoutsData = json_encode($checkoutsData);

        $countryAnalytics = $this->countryAnalytics();

        $userVisitsAnalytics = $this->userVisitsAnalytics();

        $paymantAnalyticsData = $this->paymantCountAnalytics();

        return view("admin.dashboard.index")->with([
            "countryAnalytics" => json_encode($countryAnalytics),
            "userVisitsAnalytics" => json_encode($userVisitsAnalytics),
            "checkoutsData" =>  $checkoutsData,
            "paymantAnalyticsData" => json_encode($paymantAnalyticsData)
        ]);
    }

    public function usersDayindexShow()
    {
        return view("admin.users_Dayindex.usersDayindex");
    }

    public function usersAovShow()
    {
        return view("admin.users_Aov.usersAov");
    }

    public function revenueShow()
    {
        return view("admin.revenue.revenue");
    }

    public function overallAOVShow()
    {
        return view("admin.overall.overall");
    }

    public function newuser_retUser()
    {
        return view("admin.newuser_retUser.newUserRetUser");
    }

    public function usersAll()
    {
        return view("admin.usersAll.usersAll");
    }

    public function paymantCountAnalytics()
    {

        $analyticsData = [];

        $analyticsDatas = Analytics::performQuery(

            Period::days(90),
            'ga:session',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:date,ga:pageTitle',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {

                $pageTitle = $value[1];
                $pageCount = $value[2];
                $date = $value[0];
                $year = substr($date, 0, 4);
                $month = substr($date, 4, 2);
                $day = substr($date, 6, 2);
                $newDate = "{$year}-{$month}-{$day}";

                if ($pageTitle == "Checkout - Payment") {
                    $analyticsData[] = [
                        "pageTitle" =>  $pageTitle,
                        "pageCount" => $pageCount,
                        "date" =>  $newDate
                    ];
                }
            }
        }
        return  $analyticsData;
    }

    public function countryAnalytics()
    {
        $analyticsData = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days(90),
            'ga:session',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:country',
            ]
        );


        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {
                $country = $value[0];
                $count = $value[1];

                array_push($analyticsData, [
                    "country" =>  $country,
                    "count" => $count
                ]);
            }
        }

        return $analyticsData;
    }

    public function userVisitsAnalytics()
    {

        $analyticsData = [];

        $analyticsDatas = Analytics::performQuery(
            Period::days(90),
            'ga:session',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:date',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {
                $date = $value[0];
                $year = substr($date, 0, 4);
                $month = substr($date, 4, 2);
                $day = substr($date, 6, 2);
                $newDate = "{$year}-{$month}-{$day}";
                $users = $value[1];
                array_push($analyticsData, [
                    "date" => $newDate,
                    "users" => $users
                ]);
            }
        }

        return  $analyticsData;
    }
}
