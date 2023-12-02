<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\AboutResourse;
use App\Models\ApoutThaApp;

class AboutTheAppController extends Controller
{
    use ApiResponseTrait;

    public function index(Request $request)
    {

        $apps = ApoutThaApp::first();

        if($apps){
              return $this->apiResponse(new AboutResourse($apps) , 200 , 'The data is displayed Success');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }
    }
}
