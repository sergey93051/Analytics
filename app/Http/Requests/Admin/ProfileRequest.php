<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $valid_data = [];

        $valid_data["name"] = 'required|min:2';
        $valid_data["surname"] = 'required|min:2';
        $valid_data["email"] = 'required|email';
        if (!empty($this->password)) {
            $valid_data["password"] = 'required|min:6';
        }
        if (!empty($this->file("img"))) {
            $valid_data["img"] =  'required|mimes:jpg,jpeg,png';
        }

        return $valid_data;

    }
}
