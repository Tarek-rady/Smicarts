<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if($this->method() == 'POST'){
            return [
                'company_name' => 'required',
                'company_name_en' => 'required',
                'desc'  => 'required',
                'desc_en'  => 'required',
                'icon' => 'required|mimes:png,jpg,jpeg',
                'cover'  => 'required|mimes:png,jpg,jpeg',
                'lat'  => 'nullable',
                'lng'  => 'nullable',
                'lcoation'  => 'nullable',
                'city_id'  => 'required',
                'category_id'  => 'required',
                'subcategory_id' => 'required' ,
                'name' => 'required' ,
                'email' => 'required|unique:companies,email' ,
                'password' => 'required'
            ];
        }else{
            return [
                'company_name' => 'required',
                'company_name_en' => 'required',
                'desc'  => 'required',
                'desc_en'  => 'required',
                'icon' => 'nullable',
                'cover'  => 'nullable|mimes:png,jpg,jpeg',
                'lat'  => 'nullable',
                'lng'  => 'nullable',
                'lcoation'  => 'nullable',
                'city_id'  => 'required',
                'category_id'  => 'required',
                'subcategory_id' => 'required' ,
                'name' => 'required' ,
                'email' => 'required' ,
                'password' => 'nullable'
            ];
        }

    }

    public function messages()
    {
        return [
            'company_name.required' => trans('validate.name.required'),
            'company_name_en.required' => trans('validate.name_en.required'),
            'desc.required' => trans('validate.desc.required'),
            'desc_en.required' => trans('validate.desc_en.required'),
            'icon.required' => trans('validate.icon.required'),
            'cover.required' => trans('validate.cover.required'),
            'city_id.required' => trans('validate.city_id.required'),
            'category_id.required' => trans('validate.category_id.required'),
            'subcategory_id.required' => trans('validate.subcategory_id.required'),
            'name.required' => trans('validate.admin_name.required'),
            'email.required' => trans('validate.email.required'),
            'email.unique' => trans('validate.email.unique'),
            'password.required' => trans('validate.password.required'),





        ];
    }
}
