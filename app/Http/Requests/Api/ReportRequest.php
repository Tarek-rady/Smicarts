<?php

namespace App\Http\Requests\Api;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReportRequest extends FormRequest
{
    use ApiResponseTrait;

   public function rules()
   {
       return [
        'company_id' => 'required|exists:companies,id',
        'message' => 'required',
       ];
   }

   public function failedValidation(Validator $validator)
   {

       $error = $validator->errors()->toArray();

       if ( isset($error['company_id']) ) {
           $msg = $error['company_id'][0];
           $code = 403;
       } elseif ( isset($error['message']) ) {
           $msg = $error['message'][0];
           $code = 402;
       }  else {
           $msg = __('api.error');
           $code = 401;
       }


       throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
   }
}
