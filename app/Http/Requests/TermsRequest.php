<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TermsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'desc' => 'required' ,
            'desc_en' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'desc.required' => 'يرجي ادخال الوصف باللغه العربيه',
            'desc_en.required' => 'يرجي ادخال الوصف باللغه الانجليزيه',




        ];
    }
}
