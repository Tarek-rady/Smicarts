<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\BannerResourse;
use App\Http\Resources\CategoryResourse;
use App\Http\Resources\RecomendedResourse;
use App\Models\Banner;

use App\Models\Recomended;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {

       $categories = Category::orderBy('created_at', 'desc')->get();
       $banners = Banner::orderBy('created_at', 'desc')->with(['company'])->get();

       $recomended = Recomended::orderBy('created_at', 'desc')->select('id' , 'company_id')->with(['company'])->get();


       $response = [
          'banners' => BannerResourse::collection($banners),
           'categories' => CategoryResourse::collection($categories) ,
           'recomended' => RecomendedResourse::collection($recomended)
       ];


        if($response) {
            return $this->apiResponse($response , 200 , 'Data has been entrerd sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }
    }






}
