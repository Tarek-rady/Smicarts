<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Helpers\Fatora;
use App\Http\Requests\Api\PaymentRequest;
use App\Models\Reservation;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
class paymentController extends Controller
{

     use ApiResponseTrait;

    public function get_checkout_url(PaymentRequest $request)
    {
        $payment_data = [
            "reservation_id"    => $request->reservation_id,
            "amount"            => $request->amount,
        ];
                
        $data = Fatora::getCheckoutUrl($payment_data);
            
        $data = json_decode($data);

        if($data->status == "SUCCESS"){
            
            return response()->json([
                'data' => $data->result,
                'status' => true,
                'message' => "checkout url.",
    
            ]);
        }else{
            
            return response()->json([
                'data' => null,
                'status' => false,
                'message' => $data->error,
    
            ]);
        }
    }

    public function success_payment(Request $request)
    {
        
        try {

            DB::beginTransaction();

            $reserevsion = Reservation::where('id' , $request->order_id)->first();
            

            $update_reserevsion = $reserevsion->update([
                                        "Payment_method" => "visa",
                                        "transaction_id" => $request->transaction_id,
                                        "payment_info"   => $request->description
                                    ]);

            // company

            $company = Company::where('id', $reserevsion->company_id)->first();

            // update company balance

            $reserevsion_price = $reserevsion->number_of_people * $company->price;

            $company->update([
                'balance' => $company->balance + $reserevsion_price
            ]);


            // add operation to wallet

            $x = $company->wallet()->create([
                'company_id'        => $company->id,
                'reservation_id'    => $reserevsion->id,
                'credit'            => $reserevsion_price,
            ]);
            
            DB::commit();
                    
            return $this->apiResponse(null , 200 , 'success payment');


        } catch (\Throwable $th) {
           
            DB::rollBack();
    
            throw $th;
    
            $this->apiResponse(null , 200 , $th->getMessage());
    
        
        }


    }

    public function failure_payment(Request $request)
    {

        $data = [
            "transaction_id" => $request->transaction_id,
            "order_id"       => $request->order_id,
            "response_code"  => $request->response_code
        ];
                    
                    
        Reservation::where('id' , $request->order_id)->delete();
        
        return $this->apiResponse($data , 404 , 'failure payment.');

    }

}
