<?php

namespace App\Http\Controllers\Admin\Shopify\GoogleAnalytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;



class PageViewsController extends Controller
{
    public function pageViewsShow()
    {
        $anyPageAlyticsDataAll = $this->anyPageAnalytics();


        $anyPageAlyticsData = $anyPageAlyticsDataAll[0];
        $dateAnyPage = $anyPageAlyticsDataAll[1];

        $pscAlyticsDataAll = $this->pscAnalytics();

        $pscAlyticsData = $pscAlyticsDataAll[0];
        $pscdate = $pscAlyticsDataAll[1];

        return view("admin.shopify.googleAnalytics.pageViews.pageViewShow")->with([
             "pscAlyticsData" => json_encode($pscAlyticsData),
             "pscdate" => json_encode($pscdate),
             "anyPageAlyticsData" => json_encode($anyPageAlyticsData),
             "dateAnyPage"=>json_encode($dateAnyPage)
        ]);
    }

    public function anyPageViewsTableShow()
    {
        return view("admin.shopify.googleAnalytics.pageViews.anyPageViewsTable");
    }

    public function anyPageTableFilter(Request $request)
    {
        $day = (int)$request->day;

        $analyticsData = [];

        $analyticsDatas = Analytics::performQuery(
            Period::days($day),
            'ga:session',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:pageTitle',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {

                $pageTitle = $value[0];
                $pageCount = $value[1];
                $pageTitlecheck = explode(" – ", $pageTitle);
                $pageTitlecheck = $pageTitlecheck[0];

                if (
                    $pageTitle != "Checkout - Contact information" and
                    $pageTitle != "Checkout - Payment" and
                    $pageTitle != "Checkout - Shipping" and
                    $pageTitlecheck != "Your Shopping Cart" and
                    $pageTitle != "Checkout - Stock problems" and
                    $pageTitlecheck != "Contact" and
                    $pageTitlecheck != "Products" and
                    $pageTitlecheck != "Search"
                ) {
                    array_push($analyticsData, [
                        "pageTitle" =>  $pageTitle,
                        "pageCount" => $pageCount
                    ]);
                }
            }
        }


        return response()->json(["analyticsData" => $analyticsData], 200);
    }

    public function pscFilterData(Request $request)
    {

        $day = (int)$request->day;
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days($day),
            'ga:session',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:pageTitle',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {

                $pageTitle = $value[0];
                $pageCount = $value[1];
                $pageTitlecheck = explode(" – ", $pageTitle);
                $pageTitlecheck = $pageTitlecheck[0];


                if (
                    $pageTitlecheck == "Contact" or
                    $pageTitlecheck == "Products" or
                    $pageTitlecheck == "Search"
                ) {
                    array_push($analyticsData, [
                        "pageTitle" =>  $pageTitle,
                        "pageCount" => $pageCount
                    ]);
                }
            }

        }
        array_push($date,[
            "data" => [
               "startDate" => $analyticsDatas->query->startDate,
               "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);

        return response()->json(["analyticsData" => $analyticsData,"pscdate"=>$date], 200);
    }

    public function pscAnalytics()
    {
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days(7),
            'ga:session',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:pageTitle',
            ]
        );

    if (!empty($analyticsDatas->rows)) {

        foreach ($analyticsDatas->rows as $key => $value) {

            $pageTitle = $value[0];
            $pageCount = $value[1];
            $pageTitlecheck = explode(" – ", $pageTitle);
            $pageTitlecheck = $pageTitlecheck[0];

            if (
                $pageTitlecheck == "Contact" or
                $pageTitlecheck == "Products" or
                $pageTitlecheck == "Search"
            ) {
                array_push($analyticsData, [
                    "pageTitle" =>  $pageTitle,
                    "pageCount" => $pageCount
                ]);

            }
        }
    }

    array_push($date,[
        "data" => [
           "startDate" => $analyticsDatas->query->startDate,
           "endDate" => $analyticsDatas->query->endDate,
        ]
    ]);


        return [$analyticsData,$date];
    }


    public function anyPageAnalytics()
    {
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days(7),
            'ga:session',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:pageTitle',
            ]
        );
         if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {
                if ($key <= 10) {

                    $pageTitle = $value[0];
                    $pageCount = $value[1];
                    $pageTitlecheck = explode(" – ", $pageTitle);
                    $pageTitlecheck = $pageTitlecheck[0];

                    if (
                        $pageTitle != "Checkout - Contact information" and
                        $pageTitle != "Checkout - Payment" and
                        $pageTitle != "Checkout - Shipping" and
                        $pageTitlecheck != "Your Shopping Cart" and
                        $pageTitle != "Checkout - Stock problems" and
                        $pageTitlecheck != "Contact" and
                        $pageTitlecheck != "Products" and
                        $pageTitlecheck != "Search"
                    ) {
                        array_push($analyticsData, [
                            "pageTitle" =>  $pageTitle,
                            "pageCount" => $pageCount
                        ]);
                    }
                }
            }
         }
         array_push($date,[
            "data" => [
               "startDate" => $analyticsDatas->query->startDate,
               "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);
        return [$analyticsData,$date];
    }

    public function anypageFilterdata(Request $request)
    {
        $day = (int)$request->day;
        $date = [];
        $analyticsData = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days($day),
            'ga:session',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:pageTitle',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {
                if ($key <= 10) {
                    $pageTitle = $value[0];
                    $pageCount = $value[1];
                    $pageTitlecheck = explode(" – ", $pageTitle);
                    $pageTitlecheck = $pageTitlecheck[0];

                    if (
                        $pageTitle != "Checkout - Contact information" and
                        $pageTitle != "Checkout - Payment" and
                        $pageTitle != "Checkout - Shipping" and
                        $pageTitlecheck != "Your Shopping Cart" and
                        $pageTitle != "Checkout - Stock problems" and
                        $pageTitlecheck != "Contact" and
                        $pageTitlecheck != "Products" and
                        $pageTitlecheck != "Search"
                    ) {
                        array_push($analyticsData, [
                            "pageTitle" =>  $pageTitle,
                            "pageCount" => $pageCount
                        ]);
                    }
                }
            }

        }
        array_push($date,[
            "data" => [
               "startDate" => $analyticsDatas->query->startDate,
               "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);

        return response()->json(["analyticsData" => $analyticsData,"anyPageDate"=>$date], 200);
    }
}
