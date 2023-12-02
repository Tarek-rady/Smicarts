<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subCategoryRequest extends FormRequest
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
                'color' => 'required',
                'category_id' => 'required'
            ];
        } else{
            return [
                'name' => 'required',
                'name_en' => 'required',
                'img' => 'nullable|mimes:png,jpg,jpeg',
                'color' => 'required',
                'category_id' => 'required'
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
            'color.required' => trans('validate.color'),


            'img.required' => trans('validate.img.required'),



        ];
    }
}
