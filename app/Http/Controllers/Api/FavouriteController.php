<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favouriet;
use App\Http\Controllers\Api\ApiResponseTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FavouriteResource;
use App\Models\Favourite;

class FavouriteController extends Controller
{
       use ApiResponseTrait;
    public function index()
    {
        $token = auth()->user()->id;

        $favourites = Favourite::orderBy('created_at', 'desc')->select('id' , 'company_id' , 'user_id')->where('user_id', $token)->with(['company' , 'user'])->get();


        if($favourites){
            return $this->apiResponse(FavouriteResource::collection($favourites) , 200 , 'تم عرض المفضله بنجاح');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }
    }




    public function store(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'company_id' =>'nullable|exists:companies,id',
            'user_id' => 'nullable',
        ]);

        $errors = [];
        $errorStr = '';
        $errorArr = [];

        foreach ($validator->errors()->toArray() as $key => $error) {

              $errors[$key] = $error[0];
              $errorStr .= $error[0] ;
              array_push($errorArr , $error[0] );

              return $this->apiResponse(null , 422 , $errorStr );

        }

        $favourite = Favourite::create([
            'user_id' => auth()->user()->id,
            'company_id' => $request->company_id
        ]);

        $response = [
            'favourites' => new FavouriteResource($favourite) ,

        ];


        if($favourite){
             return $this->apiResponse($response , 201 , 'data created sucessfully');
        }else{
            return $this->apiResponse(null , 400 , 'data not found');
        }


    }




    public function destroy($id)
    {
        $favourite = Favourite::where('company_id' , $id)->first();

        if($favourite){
            $company_id = Favourite::where('company_id' , $id)->delete();
              return $this->apiResponse($favourite , 200 , 'data deleted sucessfully');
        }else{
            return $this->apiResponse(null , 404 , 'not found');
        }

    }
}
