<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResourse extends JsonResource
{

    public function toArray($request)
    {


        return [
            'id' => $this->id ,
            'company_id' => $this->company_id ,
            'user_id' => $this->user_id ,
            'message' => $this->message ,

            'company' =>new CompanyResourse($this->company) ,
            'user' =>new UserResourse($this->user) ,
        ];
    }
}
