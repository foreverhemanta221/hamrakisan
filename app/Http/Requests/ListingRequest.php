<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
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
            'title'=>'required',
            'category'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'user'=>'required|unique:listings,user_id',
            'about'=>'required',
            'landmark'=>'sometimes',
            'district'=>'required',
            'province'=>'required',
            'city'=>'required',
            'logo'=>'sometimes',
            'feature_image'=>'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_image.*'=>'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
