<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecomendedResourse extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'company_id' => $this->company_id ,

            'company' =>new CompanyResourse($this->company),

        ];
    }
}
