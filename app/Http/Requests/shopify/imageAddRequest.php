<?php

namespace App\Http\Requests\shopify;

use Illuminate\Foundation\Http\FormRequest;

class imageAddRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'alt' => 'nullable|string',
            'file' => 'required|file|mimes:jpg,jpeg,png',
        ];
    }
}
