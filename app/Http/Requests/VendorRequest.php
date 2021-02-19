<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'title'=>'required|:max:255',
            'address'=>'required|max:255',
            'cp_name'=>'required|max:255',
            'email'=>'required',
        ];
    }
    public function messages()
    {
        return [
          'cp_name.required'=>'Contact person name is required',

        ];
    }
}
