<?php

namespace App\Http\Controllers\Admin\FcGraph\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FbApi;
use App\Models\FbapiChoose;


class FBApiChooseController extends Controller
{
    public function fbApi(Request $request)
    {

         session()->put("fbinput", $request->fbAccaunt);

         $this->fbapichange($request->fbAccaunt);

         return redirect()->route('fcGraphShow');
    }

    public function fbapichange($fbID): void
    {
         $fbID = FbApi::change($fbID);
         FbapiChoose::createds($fbID);
    }
}
