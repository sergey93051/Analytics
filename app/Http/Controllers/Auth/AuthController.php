<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\RegisterRequest;


    class AuthController extends Controller
    {

        public function login()
        {
            return view('admin.auth.login');
        }


        public function customLogin(LoginRequest $request)
        {

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return $this->dashboard();
            }
            return redirect()->route("login")->withValid('Login details are not valid');
        }

        public function register()
        {
            return view('admin.auth.register');
        }

        public function customRegister(RegisterRequest $request)
        {

            $this->create($request->all());

            return redirect()->route("home");
        }

        public function create(array $data)
        {

          $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'surname' => $data['surname'],
            'password' => Hash::make($data['password'])
          ]);

          Auth::login($user);

          return $user;

        }

        public function dashboard()
        {
            if(Auth::check()){
                return redirect()->route("home");
            }

            return redirect("login")->withSuccess('You are not allowed to access');
        }


        public function logout() {

            Auth::logout();

            return Redirect()->route("login");
        }



}
