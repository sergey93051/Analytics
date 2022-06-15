<?php

namespace App\FacebookApi;

use Illuminate\Support\Facades\Config;
use Facebook\Facebook;
use App\Models\FbApi;
use App\Models\FbapiChoose;


class  FbConfig
{
    public $fbConfig;

    public function fcConfig(){

         if (!is_null(FbapiChoose::first())) {

             $fbApi = FbapiChoose::pluck('fbApi')[0];

             return  FbApi::where('FCACCAUNT',$fbApi)->first();

         }else{
            return  FbApi::first();
         }

    }


    protected  function fbApi()
    {
        $fcConfig = $this->fcConfig();

        return  new Facebook([

            'app_id' =>  $fcConfig->FCAPP_ID??"",
            'app_secret' => $fcConfig->FCAPP_SECRET??"",
            'default_graph_version' => $fcConfig->FCGRAPH_VERSION??"",

        ]);
    }

    protected  function getfcID(): array
    {
        $fcConfig = $this->fcConfig();

        return [
            'accountid' =>  $fcConfig->FCACCAUNT??"",
            'token' => $fcConfig->FCToken??"",
        ];
    }
}
