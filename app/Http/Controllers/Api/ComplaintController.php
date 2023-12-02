<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Requests\Api\ReportRequest;
use App\Http\Resources\CompanyResourse;
use App\Http\Resources\ReportResourse;
use App\Models\User;

class ComplaintController extends Controller
{



     use ApiResponseTrait;
    public function store(ReportRequest $request)
    {

        $complaint = Complaint::create([
            'company_id' => $request->company_id ,
            'message' => $request->message ,
            'user_id' => auth()->user()->id ,
        ]);

        if($complaint) {
            return $this->apiResponse( new ReportResourse($complaint) , 200 , 'Data has been created sucessfully');
        }else{
            return $this->apiResponse(null , 404, 'Data not found');
        }
    }


}
