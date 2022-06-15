<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class FacebookController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {

            $user = Socialite::driver('facebook')->user();

            $userFC = User::where('fb_id', $user->id)->first();

            $userArray = explode(" ",$user->name);

            $name = $userArray[0];
            $surname = $userArray[1];


            if($userFC){

              User::find($userFC->id)->update([
                    'name' => $name,
                    "surname" => $surname,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    "fb_img" =>  $user->avatar
                ]);

                Auth::login($userFC);

                return redirect()->route("home");

            }else{
                $newUserFC = User::create([
                    'name' => $name,
                    "surname" => $surname,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    "fb_img" =>  $user->avatar
                ]);

                Auth::login($newUserFC);

                return redirect()->route("home");
            }


    }
}
