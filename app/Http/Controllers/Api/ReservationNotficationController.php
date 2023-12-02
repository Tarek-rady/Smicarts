<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Models\Notfication;
use App\Http\Resources\ReservationNotficationResource;

class ReservationNotficationController extends Controller
{
      use ApiResponseTrait;
    public function index()
    {
        $notification =  ReservationNotficationResource::collection(auth()->user()->notifications);
        return $this->apiResponse($notification , 200 , 'ok');
    }

    // public function destroy($id)
    // {
    //     $notification = Notfication::destroy($id);

    //     if($notification){
    //         return $this->apiResponse($notification , 200 , 'تم مسح البيانات بنجاح');
    //     }
    // }
}
