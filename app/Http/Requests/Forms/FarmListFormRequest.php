<?php

namespace App\Http\Requests\Forms;

use Illuminate\Foundation\Http\FormRequest;

class FarmListFormRequest extends FormRequest
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
            'farmName'=>'required|max:200|min:6',
            'farmerName'=>'required|max:200|min:6',
            'farmEmail'=>'required|unique:farm_list_forms,farmEmail|max:200|min:6',
            'farmPhone'=>'required|max:15|min:6',
            'farmLocation'=>'required|max:255|min:6'
        ];
    }
}
