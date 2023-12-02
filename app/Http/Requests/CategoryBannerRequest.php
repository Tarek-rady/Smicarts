<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryBannerRequest extends FormRequest
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
                'url'  => 'nullable',
                'img' => 'required|mimes:png,jpg,jpeg',
                'category_id' => 'required' ,
                'company_id' => 'required'
            ];
        }else{
            return [
                'name' => 'required',
                'name_en' => 'required',
                'url'  => 'nullable',
                'img' => 'nullable|mimes:png,jpg,jpeg' ,
                'category_id' => 'required' ,
                'company_id' => 'required'
            ];
        }

    }

    public function messages()
    {
        return [
            'name.required' => trans('validate.name.required'),
            'name_en.required' => trans('validate.name_en.required'),
            'company_id.required' => trans('validate.company_id.required'),
            'category_id.required' => trans('validate.category_id.required'),
            'img.required' => trans('validate.img.required'),



        ];
    }
}
