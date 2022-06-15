<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "name" => 'required|min:2',
            "surname" => 'required|min:2',
            "email" => 'required|email|unique:users',
            "password" => 'required|confirmed|min:6',
            "password_confirmation" => 'required|min:6'
        ];

    }
}
