<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TermsAndCondation;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\TermsResourse;

class TermsAndCondationController extends Controller
{
      use ApiResponseTrait;
    public function index()
    {
       $terms = TermsAndCondation::first();

        if($terms) {
            return $this->apiResponse(new TermsResourse($terms) , 200 , 'The data is displayed Success');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }
    }



}
