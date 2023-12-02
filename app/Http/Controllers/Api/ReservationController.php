<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Requests\Api\ReservationRequest;
use App\Http\Resources\ReservationDetailsResourse;
use App\Http\Resources\ReservationResourse;
use App\Notifications\ReservationStatus;

class ReservationController extends Controller
{
     use ApiResponseTrait;
    public function show($id)
    {

        $reserevsion = Reservation::orderBy('created_at', 'desc')->where('id' , $id)->first();

        if($reserevsion ) {
            $reserevsion = Reservation::where('id' , $id)->with(['company' ,'branch' ,'services'])->first();



            $response = [
                'reserevsion' => new ReservationDetailsResourse($reserevsion)   ,
               
                'total_services' => $reserevsion->services->sum('price')

            ];



            return $this->apiResponse($response , 200 , 'Data has been entrerd sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }

    }


    public function store(ReservationRequest $request)
    {

       $reserevsion = Reservation::create([
            'number_of_people' => $request->number_of_people,
            'branch_id' => $request->branch_id,
            'desc' => $request->desc,
            'Payment_method' => $request->Payment_method,
            'user_id' => auth()->user()->id,
            'company_id' => $request->company_id,
            'status' =>'waiting' ,
            'date' => $request->date ,
            'time' => $request->time ,
        ]);

        $reserevsion->services()->attach($request->service_id);

        if($reserevsion) {
            return $this->apiResponse(new ReservationResourse($reserevsion) , 201 , 'Booked successfully');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }

    }


    public function getReservationUser()
    {

        $token = auth()->user()->id;
        $reserevsion = Reservation::orderBy('created_at', 'desc')->select('id' , 'status')->where('user_id' , $token)->get();


        if($reserevsion) {
            return $this->apiResponse($reserevsion , 200 , 'Data has been entrerd sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }

    }

    public function ChangeStatuReservation($id , Request $request)
    {
        $reserevsion = Reservation::where('id' , $id)->first();
        $reserevsion->update(['status' => $request->status]);
        
        $title = 'إلغاء الحجز';
        $message = " تم إلغاء الحجز بنجاح رقم الحجز" . $reserevsion->id;

        $reserevsion->user->notify(new ReservationStatus($title, $message,$reserevsion->id));

        if($reserevsion){
            return $this->apiResponse($reserevsion , 200 , 'The status has not been successfully changed');
        }else{
            return $this->apiResponse(null , 404 , 'reserevsion Not found');

        }
    }


}
