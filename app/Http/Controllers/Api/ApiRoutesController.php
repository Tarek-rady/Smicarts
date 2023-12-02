<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Models\ApiRoute;

class ApiRoutesController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
      $apis = ApiRoute::select('Google_play_url' , 'App_store_url')->get();
      return $this->apiResponse($apis , 200 , '');
    }
}
