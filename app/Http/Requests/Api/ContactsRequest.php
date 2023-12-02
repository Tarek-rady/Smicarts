<?php

namespace App\Http\Requests\Api;


use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class ContactsRequest extends FormRequest
{

    use ApiResponseTrait;

    public function rules()
    {
        return [
            'name' => 'string|between:2,100',
            'mobile' => 'required|numeric|min:6',
            'message' => 'required' ,
            'img' => 'nullable|mimes:jpg,jpeg,png',
            'complaint_type' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['name']) ) {
            $msg = $error['name'][0];
            $code = 403;
        } elseif ( isset($error['mobile']) ) {
            $msg = $error['mobile'][0];
            $code = 402;
        }elseif ( isset($error['message']) ) {
            $msg = $error['message'][0];
            $code = 402;
        }elseif ( isset($error['img']) ) {
            $msg = $error['img'][0];
            $code = 402;
        }elseif ( isset($error['complaint_type']) ) {
            $msg = $error['complaint_type'][0];
            $code = 402;
        }  else {
            $msg = __('api.error');
            $code = 401;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }
}
