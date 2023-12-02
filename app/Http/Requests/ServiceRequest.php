<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'price' => 'required|numeric' ,
            'desc' => 'required' ,
            'desc_en' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('validate.name.required'),
            'name_en.required' =>trans('validate.name_en.required'),
            'price.required' => trans('validate.price.required'),
            'price.numeric' => 'يرجي ادخال السعر ارقام فقط  ',
            'desc.required' => trans('validate.desc.required'),
            'desc_en.required' => trans('validate.desc_en.required'),



        ];
    }
}
