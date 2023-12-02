<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required' ,
            'name_en' => 'required' ,
            'lat' => 'nullable' ,
            'lng' => 'nullable' ,
            'location' => 'nullable' ,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validate.name.required'),
            'name_en.required' => trans('validate.name_en.required'),



        ];
    }




}
