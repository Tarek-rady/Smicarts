<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => 'required' ,
            'message' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validate.title.required'),
            'message.required' => trans('validate.message.required'),

        ];
    }




}
