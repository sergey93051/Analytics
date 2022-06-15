<?php

namespace App\Http\Requests\shopify;

use Illuminate\Foundation\Http\FormRequest;

class collectionRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'title' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png',
        ];
    }
}
