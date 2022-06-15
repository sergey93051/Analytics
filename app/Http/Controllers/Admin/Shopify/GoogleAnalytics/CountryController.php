<?php

namespace App\Http\Controllers\Admin\Shopify\GoogleAnalytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;


class CountryController extends Controller
{
    public function countryShow()
    {
        $countryAnalyticsDataAll = $this->countryAnalytics();

        $countryAnalyticsData = $countryAnalyticsDataAll[0];
        $dateCountry = $countryAnalyticsDataAll[1];

        $cityAnalyticsDataAll = $this->cityAnalytics();
        $cityAnalyticsData = $cityAnalyticsDataAll[0];
        $dateCity = $cityAnalyticsDataAll[1];

        return view("admin.shopify.googleAnalytics.country.countryShow")->with([
            "cityAnalyticsData" => json_encode($cityAnalyticsData),
            "dateCity" => json_encode($dateCity),
            "countryAnalyticsData" => json_encode($countryAnalyticsData),
            "dateCountry" => json_encode($dateCountry),
        ]);
    }

    public function countryAnalytics()
    {
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days(7),
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
        array_push($date, [
            "data" => [
                "startDate" => $analyticsDatas->query->startDate,
                "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);

        return [$analyticsData, $date];
    }

    public function cityAnalytics()
    {
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days(7),
            'ga:session',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:city',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {

                $city = $value[0];
                $count = $value[1];

                array_push($analyticsData, [
                    "city" =>  $city,
                    "count" => $count
                ]);
            }
        }

        array_push($date, [
            "data" => [
                "startDate" => $analyticsDatas->query->startDate,
                "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);

        return [$analyticsData, $date];
    }

    public function countryFilterData(Request $request)
    {

        $day = (int)$request->day;
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days($day),
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

        array_push($date, [
            "data" => [
                "startDate" => $analyticsDatas->query->startDate,
                "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);

        return response()->json(["analyticsData" => $analyticsData, "countrydate" => $date, "day" => $day], 200);
    }

    public function cityFilterData(Request $request)
    {
        $day = (int)$request->day;

        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days($day),
            'ga:session',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:city',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {
                $city = $value[0];
                $count = $value[1];

                array_push($analyticsData, [
                    "city" =>  $city,
                    "count" => $count
                ]);
            }
        }
        array_push($date, [
            "data" => [
                "startDate" => $analyticsDatas->query->startDate,
                "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);
        return response()->json([
            "analyticsData" => $analyticsData,
            "date" => $date
        ], 200);
    }
}
