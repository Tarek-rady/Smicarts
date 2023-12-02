<?php

namespace App\Http\Requests\Api;

use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReservationRequest extends FormRequest
{
    use ApiResponseTrait;

    public function rules()
    {
        return [
            'number_of_people' => 'required|numeric',
            'branch_id' => 'required|exists:branches,id',
            'desc' => 'nullable',
            'Payment_method' => 'required',
            'date' => 'required',
            'time' => 'required',
            'company_id' => 'required|exists:companies,id',
            'service_id' => 'nullable|exists:services,id'
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $error = $validator->errors()->toArray();

        if ( isset($error['number_of_people']) ) {
            $msg = $error['number_of_people'][0];
            $code = 403;
        } elseif ( isset($error['branch_id']) ) {
            $msg = $error['branch_id'][0];
            $code = 402;
        }elseif ( isset($error['desc']) ) {
            $msg = $error['desc'][0];
            $code = 402;
        }elseif ( isset($error['Payment_method']) ) {
            $msg = $error['Payment_method'][0];
            $code = 402;
        }elseif ( isset($error['date']) ) {
            $msg = $error['date'][0];
            $code = 402;
        }elseif ( isset($error['time']) ) {
            $msg = $error['time'][0];
            $code = 402;
        }elseif ( isset($error['company_id']) ) {
            $msg = $error['company_id'][0];
            $code = 402;
        }  else {
            $msg = __('api.error');
            $code = 401;
        }


        throw new HttpResponseException($this->apiResponse( null , $code , $msg) );
    }


}
