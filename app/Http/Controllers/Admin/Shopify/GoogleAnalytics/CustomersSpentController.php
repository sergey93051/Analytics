<?php

namespace App\Http\Controllers\Admin\Shopify\GoogleAnalytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\Shopify;

class CustomersSpentController extends Controller
{
    public function CustomersSpentShow()
    {

        $customersData = $this->customersAnalytics();

        return view("admin.shopify.googleAnalytics.custSpent.custSpentShow")->with(
            "customersAnalyticsData",
            json_encode($customersData)
        );
    }

    public function customersAnalytics()
    {

        $customersData = [];

        $data = Shopify::getJson("customers");

        foreach ($data as $value) {
            $create_date = substr($value['created_at'], 0, 10);
            array_push($customersData, [
                "count" => 1,
                "total_spent" => (float)$value['total_spent'],
                "created_at" => $create_date
            ]);
        }

        return $this->filterData($customersData);
    }


    public function filterData($arg)
    {
        $newarray = array();
        $result = [];

        foreach ($arg as $value) {
            $temp = explode(" ", $value['created_at']);
            $date = $temp[0];
            $total_spent = (isset(
                    $newarray[$date]['total_spent']
                ) ?
                $newarray[$date]['total_spent'] + $value['total_spent'] :
                $value['total_spent']
            );
            $count = (isset(
                    $newarray[$date]['count']
                ) ?
                $newarray[$date]['count'] + $value['count'] :
                $value['count']
            );
            $newarray[$date] = array(
                'created_at' => $date,
                'total_spent' => $total_spent,
                "count" => $count
            );
        }

        foreach ($newarray as $key => $value) {
            array_push($result, $value);
        }

        return $result;
    }
}
