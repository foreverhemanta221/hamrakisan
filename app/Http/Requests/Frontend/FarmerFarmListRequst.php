<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class FarmerFarmListRequst extends FormRequest
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
            'farmName'=>'required|min:6|max:255',
            'farmProvince'=>'required|max:255',
            'farmDistrict'=>'required|max:255',
            'farmCity'=>'required|min:6|max:255',
//            'farmSpecificAddress'=>'min:4|max:255',
            'farmPhone'=>'required|min:6|max:30',
            'farmEmail'=>'required|min:6|max:30',
//            'farmWebsite'=>'min:6|max:255',
//            'farmFacebook'=>'min:6|max:255',
//            'farmYoutube'=>'min:6|max:255',
            'gallery_image'=>'required'
        ];
    }
}
