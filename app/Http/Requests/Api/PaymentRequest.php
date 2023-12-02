<?php

namespace App\Http\Requests\Api;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PaymentRequest extends FormRequest
{
    use ApiResponseTrait;

    public function rules()
    {
        return [
            'reservation_id'    => 'required|exists:reservations,id',
            'amount'            => 'required'
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['reservation_id']) ) {
            $msg = $error['reservation_id'][0];
            $code = 403;
        } elseif ( isset($error['amount']) ) {
            $msg = $error['amount'][0];
            $code = 402;
        }  else {
            $msg = __('api.error');
            $code = 401;
        }

        // throw new HttpResponseException($this->apiResponse( null , $code , $msg) );

        throw new HttpResponseException( response()->json(['data' => null,'status' => false ,'message' => $msg,]));
    }


}
