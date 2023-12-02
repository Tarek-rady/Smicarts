<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyBannerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if($this->method() == 'POST'){
            return [
                'name' => 'required',
                'name_en' => 'required',
                'img' => 'required|mimes:png,jpg,jpeg',
                'url' => 'nullable',
            ];
        } else{
            return [
                'name' => 'required',
                'name_en' => 'required',
                'img' => 'nullable|mimes:png,jpg,jpeg',
                'url' => 'nullable',
            ];
        }

    }

    public function messages()
    {
        return [
            'name.required' => trans('validate.name.required'),
            'name_en.required' => trans('validate.name_en.required'),
            'img.required' => trans('validate.img.required'),



        ];
    }


}
