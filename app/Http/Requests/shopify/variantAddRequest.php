<?php

namespace App\Http\Requests\shopify;

use Illuminate\Foundation\Http\FormRequest;

class variantAddRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'option1' => 'required|string',
            'price' => 'nullable|numeric|min:1',
            'sku' => 'nullable|string|min:1',
            'weight' => 'nullable|numeric|min:1'
        ];
    }
}
