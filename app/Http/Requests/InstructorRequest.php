<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorRequest extends FormRequest
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
            'instructor_name'=>'required|max:255|min:6|string',
            'instructor_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'instructor_profession'=>'required|max:255|min:6|string',
            'instructor_detail'=>'required|string',
        ];
    }
}
