<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\BannerResourse;
use App\Http\Resources\CategoryBannerResource;
use App\Http\Resources\CompanyResourse;
use App\Http\Resources\SuBCategoryResourse;
use App\Models\CategoryBanner;
use App\Models\Company;
use App\Models\Favouriet;
use Illuminate\Support\Facades\Validator;

class SubCategoryByCategoryController extends Controller
{
    use ApiResponseTrait;



    public function show($id)
    {
        $category= Category::orderBy('created_at', 'desc')->where('id' , $id)->first();
        $subcategory = SubCategory::orderBy('created_at', 'desc')->where('category_id' , $id )->with(['category'])->get();

        $banners = CategoryBanner::orderBy('created_at', 'desc')->where('category_id' , $id)->with(['category' ,'company' ,])->get();



        $companies = Company::orderBy('created_at', 'desc')->with(['category','category' ])->where('category_id' , $id)->get();



        $response =[

            'subcategory' => SuBCategoryResourse::collection($subcategory) ,
            'banners' => CategoryBannerResource::collection($banners) ,
            'companies' =>CompanyResourse::collection($companies) ,
        ];



            if($category) {
                return $this->apiResponse($response , 200 , 'Data has been entrerd sucessfully');
            }else{
                return $this->apiResponse(null , 404 , 'Data not found');
            }
    }




    public function filter(Request $request)
    {
         // validation
         $validator = Validator::make($request->all(), [
            'subcategory_id' => 'nullable',
            'city_id' => 'nullable',
        ]);


        $whereArr = [
                        ['id', '>', 0],
        ];

        if($request->has('city_id')){
            array_push($whereArr, ['city_id', '=', $request->city_id]);
        }

        if($request->has('subcategory_id')){
            array_push($whereArr, ['subcategory_id', '=', $request->subcategory_id]);
        }




        $filter=  Company::orderBy('created_at', 'desc')->where($whereArr)->get();






        if($filter ) {
            return $this->apiResponse(CompanyResourse::collection($filter) , 200 , 'Data has been entrerd sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }

    }



}
