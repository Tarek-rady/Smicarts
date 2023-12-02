<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required'  ,
            'title_en' => 'required'  ,
            'desc' => 'required' ,
            'desc_en' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validate.title.required'),
            'title_en.required' => trans('validate.title_en.required'),
            'desc.required' => trans('validate.desc.required'),
            'desc_en.required' => trans('validate.desc_en.required'),








        ];
    }
}
