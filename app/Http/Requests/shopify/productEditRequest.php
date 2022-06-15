<?php

namespace App\Http\Requests\shopify;

use Illuminate\Foundation\Http\FormRequest;

class productEditRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

                'title' => 'required|string',
                'bodyHtml' => 'nullable|string|min:2',

        ];
    }
}
