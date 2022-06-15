<?php

namespace App\Http\Requests\shopify;

use Illuminate\Foundation\Http\FormRequest;

class CostumersRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
        ];
    }
}
