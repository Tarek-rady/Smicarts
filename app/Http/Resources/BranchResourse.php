<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BranchResourse extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'lat' => $this->lat ,
            'lng' => $this->lng ,
            'location' => $this->location ,
            'company_id' => $this->company_id  ,

            'company' => new CompanyResourse($this->company)  ,

        ];
    }
}
