<?php

namespace App\FacebookApi;

use App\FacebookApi\FcApiGetRequest;

class  Data
{

    public function get($url, $date = '')
    {
        $fcApiGetRequest = new FcApiGetRequest($url, $date);

        return $fcApiGetRequest->getData();
    }

    public function post()
    {
        return "post";
    }

    public function put()
    {
        return "put";
    }

    public function delete()
    {
        return "delete";
    }
}
