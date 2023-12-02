<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\CompanyResourse;
use App\Models\Branch;
use App\Models\City;
use App\Models\CompanyBanner;
use App\Models\Service;
use App\Http\Resources\bannersResourse;
use App\Http\Resources\BranchResourse;
use App\Http\Resources\CityResourse;
use App\Http\Resources\ServicesResourse;


class CompanyController extends Controller
{
   use ApiResponseTrait;

    public function show($id)
    {

        $company = Company::orderBy('created_at', 'desc')->with(['city' ,'category' ,'subCategory' , 'branches' , 'services' ])->where('id' , $id)->first();
        $banners = CompanyBanner::orderBy('created_at', 'desc')->where('company_id' , $id)->get();


        $response = [
            'company' =>  new CompanyResourse($company),
            'banners' =>  bannersResourse::collection($banners),
        ];

        if($company) {
            return $this->apiResponse($response , 200 , 'Data has been entrerd sucessfully');
            }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }
    }

    public function branches($id)
    {
         $branches = Branch::orderBy('created_at', 'desc')->where('company_id' , $id)->with(['company'])->get();

         if($branches){
            return $this->apiResponse( BranchResourse::collection($branches) , 200 ,  'The data has been entrated successfully');
         }else{
             $this->apiResponse(null , 404 , 'data not found');
         }
    }

    public function getCity()
    {
        $cities = City::orderBy('created_at', 'desc')->select('id' , 'name')->get();

        if($cities){
           return $this->apiResponse(CityResourse::collection($cities) , 200 , 'data has been entreded sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'data has been not found');
        }
    }

}
