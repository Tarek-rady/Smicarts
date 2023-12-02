<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecomendedRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'company_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>trans('validate.name.required'),
            'name_en.required' =>trans('validate.name_en.required'),
            'company_id' =>trans('validate.company_id.required'),
            'img.required' => trans('validate.img.required'),



        ];
    }
}
