<?php

namespace App\Http\Controllers\Admin\Shopify\GoogleAnalytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;

class BrowserController extends Controller
{
    public function browserVisits(){

        $browserAnalyticsDataAll = $this->browserAnalytics();

        $browserAnalyticsData = $browserAnalyticsDataAll[0];
        $dateBrowser = $browserAnalyticsDataAll[1];

        return view('admin.shopify.googleAnalytics.browser.browserVisitsShow')->with([
            "browserAnalyticsData" => json_encode($browserAnalyticsData),
            "dateBrowser" => json_encode($dateBrowser)
        ]);
    }

    public function browserAnalytics()
    {
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days(7),
            'ga:session',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:browser',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {
                $browser = $value[0];
                $count = $value[1];

                array_push($analyticsData, [
                    "browser" =>  $browser,
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

    public function browserFilterdata(Request $request){
        $day = (int)$request->day;
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
             Period::days($day),
            'ga:session',
            [
                'metrics' => 'ga:users',
                'dimensions' => 'ga:browser',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {
                $browser = $value[0];
                $count = $value[1];

                array_push($analyticsData, [
                    "browser" =>  $browser,
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

        return response()->json(["analyticsData" => $analyticsData, "datebrowser" => $date], 200);
    }
}
