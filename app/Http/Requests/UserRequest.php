<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'mobile' => 'required|numeric',
                'email' => 'required|email|unique:users,email' ,
                'img' => 'nullable|mimes:png,jpg,jpeg'

            ];
        }else{
            return [
                'name' => 'required',
                'mobile' => 'required|numeric',
                'email' => 'required|email' ,
                'img' => 'nullable|mimes:png,jpg,jpeg'

            ];
        }



    }
}
