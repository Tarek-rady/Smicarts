<?php

namespace App\Http\Requests\Api;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegister extends FormRequest
{
   use ApiResponseTrait;

   public function rules()
   {
       return [
        'name' => 'required|string|between:2,100',
        'email' => 'required|string|email|max:100|unique:users',
        'mobile' => 'required|numeric|min:6|unique:users,mobile',
        'img' => 'nullable|mimes:jpg,jpeg,png' ,
        'device_key' => 'nullable'
       ];
   }

   public function failedValidation(Validator $validator)
   {

       $error = $validator->errors()->toArray();

       if ( isset($error['name']) ) {
           $msg = $error['name'][0];
           $code = 403;
       } elseif ( isset($error['email']) ) {
           $msg = $error['email'][0];
           $code = 402;
       } elseif ( isset($error['mobile']) ) {
            $msg = $error['mobile'][0];
            $code = 402;
       } elseif ( isset($error['img']) ) {
            $msg = $error['img'][0];
            $code = 402;
       }   else {
           $msg = __('api.error');
           $code = 401;
       }


       throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
   }



}
