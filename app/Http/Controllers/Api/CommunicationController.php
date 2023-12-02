<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Communication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Requests\Api\ContactsRequest;
use App\Http\Resources\ContactResourse;

class CommunicationController extends Controller
{
    use ApiResponseTrait;
    public function store(ContactsRequest $request)
    {
        $request_data = $request->all();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $file_name = $image->getClientOriginalName();
            $request->img->move(public_path('/Attachments/contacts/'), $file_name);
            $request_data['img'] = $file_name;
        }


        $communications = Communication::create($request_data);


        if($communications){
           return $this->apiResponse( new ContactResourse($communications) , 201 , 'Communication has been created');
        }else{
            return $this->apiResponse(null , 404 , 'Data not found');
        }

    }

}
