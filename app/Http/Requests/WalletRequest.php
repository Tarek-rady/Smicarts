<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'debit' => 'required' ,
        ];
    }

    public function messages()
    {
        return [
            'debit' => trans('validate.required'),
            'debit' => trans('validate.required'),
        ];
    }




}
