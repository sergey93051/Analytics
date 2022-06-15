<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class GoogleController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithgoogle()
    {

            $user = Socialite::driver('google')->user();

            $userGoogle = User::where('gl_id', $user->id)->first();

            $userArray = explode(" ",$user->name);

            $name = $userArray[0];
            $surname = $userArray[1];

            if($userGoogle){

              User::find($userGoogle->id)->update([
                    'name' => $name,
                    "surname" => $surname,
                    'email' => $user->email,
                    'gl_id' => $user->id,
                    "gl_img" =>  $user->avatar
                ]);

                Auth::login($userGoogle);

                return redirect()->route("home");

            }else{
                $newUserGoogle = User::create([
                    'name' => $name,
                    "surname" => $surname,
                    'email' => $user->email,
                    'gl_id' => $user->id,
                    "gl_img" =>  $user->avatar
                ]);

                Auth::login($newUserGoogle);

                return redirect()->route("home");

             }

    }
}
