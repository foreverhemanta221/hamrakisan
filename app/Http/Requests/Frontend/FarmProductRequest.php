<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class FarmProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'image'=>'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'minimum_quantity'=>'required',
            'price'=>'required',
            'is_available'=>'required'

        ];
    }
}
