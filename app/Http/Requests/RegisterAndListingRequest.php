<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAndListingRequest extends FormRequest
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
            'farm_name'=>'required|max:255',
            'name'=>'required|max:255',
            'email'=>'required|unique:users,email|max:190',
            'category'=>'required',
            'province'=>'required',
            'district'=>'required',
            'city'=>'required',
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique'=>'Email already exist please inform us to make sure about your farm'
        ];

    }


}
