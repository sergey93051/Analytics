<?php

namespace App\Http\Controllers\Admin\Shopify\GoogleAnalytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;


class UsersVisitsController extends Controller
{
    public function userVisitsShow(){

        $channelanalyticsDataAll =  $this->channelAnalytics();

        $channelanalyticsData = $channelanalyticsDataAll[0];
        $dateChannel = $channelanalyticsDataAll[1];

        $userVisitsanalyticsData = $this->userVisitsAnalytics();

        return view("admin.shopify.googleAnalytics.usersVisits.usersVisitsShow")
        ->with([
            "analyticsData"=>json_encode($userVisitsanalyticsData),
            "channelAnalyticsData"=>json_encode($channelanalyticsData),
            "dateChannel" =>json_encode($dateChannel)
        ]);
     }

     public function userChannelFilterData(Request $request){

        $analyticsData = [];
        $date=[];
        $day = (int)$request->day;
        $analyticsDatas = Analytics::performQuery(
            Period::days($day),
            'ga:session',
            [
             'metrics' => 'ga:users',
             'dimensions' => 'ga:channelGrouping',
            ]
          );

          if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as  $value) {
                $channel = $value[0];
                $users = $value[1];

              array_push($analyticsData,[
                  "channel" => $channel,
                  "users" => $users,
              ]);

            }

          }
          array_push($date,[
            "data" => [
               "startDate" => $analyticsDatas->query->startDate,
               "endDate" => $analyticsDatas->query->endDate,
            ]
        ]);


         return response()->json(["ChannelanalyticsData"=>$analyticsData,"dateChannel"=>$date],200);
     }


   public function userVisitsAnalytics(){

    $analyticsData = [];

    $analyticsDatas = Analytics::performQuery(
        Period::days(7),
        'ga:session',
        [
         'metrics' => 'ga:users',
         'dimensions' => 'ga:date',
        ]
      );

     if (!empty($analyticsDatas->rows)) {
        foreach ($analyticsDatas->rows as $key => $value) {
            $date = $value[0];
            $year = substr($date,0,4);
            $month = substr($date,4,2);
            $day = substr($date,6,2);
            $newDate = "{$year}-{$month}-{$day}";
            $users = $value[1];
             array_push($analyticsData,[
                 "date" => $newDate,
                 "users" => $users
             ]);
         }
     }

     return  $analyticsData;
   }


    public function channelAnalytics(){

        $analyticsData = [];
        $date=[];

        $analyticsDatas = Analytics::performQuery(
            Period::days(7),
            'ga:session',
            [
             'metrics' => 'ga:users',
             'dimensions' => 'ga:channelGrouping',
            ]
          );

         if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as  $value) {
                $channel = $value[0];
                $users = $value[1];

              array_push($analyticsData,[
                  "channel" => $channel,
                  "users" => $users,
              ]);

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

    public function userVisitsFilterdata(Request $request){

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
             'metrics' => 'ga:users',
             'dimensions' => 'ga:date',
            ]
          );

         if (!empty($analyticsDatas->rows)) {
            foreach ($analyticsDatas->rows as $key => $value) {
                $date = $value[0];
                $year = substr($date,0,4);
                $month = substr($date,4,2);
                $day = substr($date,6,2);
                $newDate = "{$year}-{$month}-{$day}";
                $users = $value[1];
                 array_push($analyticsData,[
                     "date" => $newDate,
                     "users" => $users
                 ]);
             }
         }

         return response()->json(["analyticsData"=>$analyticsData],200);
    }

    public function userVisitsTable(){

        $analyticsData = [];

        $analyticsDatas = Analytics::performQuery(
            Period::days(7),
            'ga:session',
            [
             'metrics' => 'ga:users',
             'dimensions' => 'ga:date',
            ]
          );

       if (!empty($analyticsDatas->rows)) {
        foreach ($analyticsDatas->rows as $key => $value) {
            $date = $value[0];
            $year = substr($date,0,4);
            $month = substr($date,4,2);
            $day = substr($date,6,2);
            $newDate = "{$year}-{$month}-{$day}";
            $users = $value[1];
             array_push($analyticsData,[
                 "date" => $newDate,
                 "users" => $users
             ]);
         }
       }

        return view("admin.shopify.googleAnalytics.usersVisits.usersVisits")->with(
            'analyticsData',json_encode($analyticsData)
        );;
    }
}
