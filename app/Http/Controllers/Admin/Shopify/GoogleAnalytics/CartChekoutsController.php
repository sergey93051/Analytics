<?php

namespace App\Http\Controllers\Admin\Shopify\GoogleAnalytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;


class CartChekoutsController extends Controller
{
    public function cartCheckoutshow()
    {

        $cartAnalyticsData = $this->cartAnalytics();

        $checkoutAnalyticsDataAll = $this->checkoutAnalytics();

        $checkoutAnalyticsData = $checkoutAnalyticsDataAll[0];
        $dateCheckout =  $checkoutAnalyticsDataAll[1];

        return view("admin.shopify.googleAnalytics.cartChekout.cartCheckoutShow")->with([
            'analyticsData' => json_encode($checkoutAnalyticsData),
            "cartAnalyticsData" => json_encode($cartAnalyticsData),
            "dateCheckout" => json_encode($dateCheckout)
        ]);
    }


    public function cartAnalytics()
    {

        $analyticsData = [];

        $analyticsDatas = Analytics::performQuery(
            Period::days(7),
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

                $pageTitlecheck = explode(" – ", $pageTitle);
                $pageTitlecheck = $pageTitlecheck[0];

                if (
                    $pageTitlecheck == "Your Shopping Cart"
                ) {
                    $analyticsData[] = [
                        "date" => $newDate,
                        "pageTitle" =>  $pageTitle,
                        "pageCount" => $pageCount,
                    ];
                }
            }
        }

        return  $analyticsData;
    }

    public function checkoutAnalytics()
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

                if (
                    $pageTitle == "Checkout - Contact information" or
                    $pageTitle == "Checkout - Payment" or
                    $pageTitle == "Checkout - Shipping" or
                    $pageTitle == "Checkout - Stock problems"
                ) {
                    $analyticsData[] = [
                        "pageTitle" =>  $pageTitle,
                        "pageCount" => $pageCount,
                    ];
                }
            }
        }
        array_push($date, [
            "data" => [
                "startDate" => $analyticsDatas->query->startDate,
                "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);

        return  [$analyticsData, $date];
    }

    public function checkoutFilterData(Request $request)
    {
        $day = (int)$request->day;
        $analyticsData = [];
        $date = [];
        $analyticsDatas = Analytics::performQuery(
            Period::days($day),
            'ga:users',
            [
                'metrics' => 'ga:pageviews',
                'dimensions' => 'ga:pageTitle',
            ]
        );

        if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {

                $pageTitle = $value[0];
                $pageCount = $value[1];

                if (
                    $pageTitle == "Checkout - Contact information" or
                    $pageTitle == "Checkout - Payment" or
                    $pageTitle == "Checkout - Shipping" or
                    $pageTitle == "Checkout - Stock problems"
                ) {
                    $analyticsData[] = [
                        "pageTitle" =>  $pageTitle,
                        "pageCount" => $pageCount,
                    ];
                }
            }
        }
        array_push($date, [
            "data" => [
                "startDate" => $analyticsDatas->query->startDate,
                "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);

        return response()->json(["analyticsData" => $analyticsData, "date" => $date, "day" => $day], 200);
    }

    public function cartFilterData(Request $request)
    {
        $analyticsData = [];
        $parseStartDate =  Carbon::parse($request->startDay)->format('y-m-d');
        $startDate = Carbon::createFromFormat('y-m-d', $parseStartDate);

        $parseEndDate =  Carbon::parse($request->endDay)->format('y-m-d');
        $endDate = Carbon::createFromFormat('y-m-d', $parseEndDate);

        $createDate =  Period::create($startDate, $endDate);

        $analyticsDatas = Analytics::performQuery(
            $createDate,
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

                $pageTitlecheck = explode(" – ", $pageTitle);
                $pageTitlecheck = $pageTitlecheck[0];

                if (
                    $pageTitlecheck == "Your Shopping Cart"
                ) {
                    $analyticsData[] = [
                        "date" => $newDate,
                        "pageTitle" =>  $pageTitle,
                        "pageCount" => $pageCount,
                    ];
                }
            }
        }

        return response()->json(["analyticsData" => $analyticsData], 200);
    }
}
