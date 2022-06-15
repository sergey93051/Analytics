<?php

namespace App\Http\Controllers\Admin\Shopify\GoogleAnalytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;
use App\Facades\Shopify;

class PaymantController extends Controller
{
   public function paymantShow(){

    $paymantDetailsanalyticsData = $this->paymantDetailsAnalytics();

    $paymantCountanalyticsData = $this->paymantCountAnalytics();

    return view("admin.shopify.googleAnalytics.paymant.paymantView")->with([
        "analyticsData"=>json_encode($paymantCountanalyticsData),
        "paymantDetailsanalyticsData"=>json_encode($paymantDetailsanalyticsData)
    ]);

  }

   public function paymantCountAnalytics(){

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
             $year = substr($date,0,4);
             $month = substr($date,4,2);
             $day = substr($date,6,2);
             $newDate = "{$year}-{$month}-{$day}";

             if ($pageTitle == "Checkout - Payment") {
                 $analyticsData[] = [
                     "pageTitle" =>  $pageTitle,
                     "pageCount" => $pageCount,
                     "date"=>  $newDate
                 ];

             }
          }
      }
        return  $analyticsData;
   }

   public function paymantDetailsAnalytics(){

        $paymantDetailsData = [];
        $checkoutsData = Shopify::getJson("checkouts");

         foreach ($checkoutsData as $key => $value) {
              $total_price = !empty($value['total_price'])?$value['total_price']:"0";
              $total_tax = !empty($value['total_tax'])?$value['total_tax']:"0";
              $total_discounts = !empty($value['total_discounts'])?$value['total_discounts']:"0";
              $create_date = $value["created_at"];
              $create_date = substr($create_date,0,10);
              array_push($paymantDetailsData,[
                 "currency" => $value['currency'],
                 "total_price" => (float)$total_price,
                 "total_tax" => (float)$total_tax,
                 "total_discounts" => (float)$total_discounts,
                 "create_date" => $create_date
              ]);
         }

      return  $this->filterData($paymantDetailsData);
   }

   public function paymantCountFilterdata(Request $request){

    $analyticsData = [];
    $parseStartDate =  Carbon::parse($request->startDay)->format('y-m-d');
    $startDate = Carbon::createFromFormat('y-m-d',$parseStartDate);


    $parseEndDate =  Carbon::parse($request->endDay)->format('y-m-d');
    $endDate = Carbon::createFromFormat('y-m-d',$parseEndDate);

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
             $year = substr($date,0,4);
             $month = substr($date,4,2);
             $day = substr($date,6,2);
             $newDate = "{$year}-{$month}-{$day}";

             if ($pageTitle == "Checkout - Payment") {
                 $analyticsData[] = [
                      "pageTitle" =>  $pageTitle,
                      "pageCount" => $pageCount,
                      "date"=>  $newDate
                 ];
             }
          }
      }

      return response()->json(["analyticsData"=>$analyticsData],200);
   }

    public function filterData($arg){

        $newarray = array();
        $result = [];

        foreach ($arg as $value) {

            $temp = explode(" ", $value['create_date']);
            $date = $temp[0];
            $total_price = (isset($newarray[$date]['total_price']) ?
                    $newarray[$date]['total_price'] + $value['total_price'] :
                    $value['total_price']
            );
            $total_tax = (isset($newarray[$date]['total_tax']) ?
            $newarray[$date]['total_tax'] + $value['total_tax'] :
            $value['total_tax']
            );
            $total_discounts = (isset($newarray[$date]['total_discounts']) ?
            $newarray[$date]['total_discounts'] + $value['total_discounts'] :
            $value['total_discounts']
            );

            $newarray[$date] = array(
                "currency" => $value['currency'],
                'create_date' => $date,
                'total_price' => $total_price,
                "total_tax" => $total_tax,
                "total_discounts" => $total_discounts
            );
        }

        foreach ($newarray as $value) {
            array_push($result,$value);
        }

       return $result;
    }
}
