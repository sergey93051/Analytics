<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view("admin.profile.profileShow");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {

      $user_update = User::find($id);

      $user_update->update([
          "name" => $request->name,
          "surname" => $request->surname,
          "email" => $request->email
      ]);

      if (!empty($request->password)) {
        $user_update->update([
            "password" =>  Hash::make($request->password)
        ]);
      }

      if ($request->file("img")) {

          $img = $this->imgUpload($request);

          $user_update->update([
                "img" => $img
          ]);

      }

      return  redirect()->back()->withSuccess("successfully updated");

    }

    public function imgUpload($request){

        $fileName = $request->file('img')->getClientOriginalName();

        $request->file('img')->storeAs('user', $fileName, 'public');

        return $fileName;
    }

}
