<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationDetailsResourse extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'number_of_people' => $this->number_of_people ,
            'branch_id' => $this->branch_id ,
            'desc' => $this->desc ,
            'Payment_method' => $this->Payment_method ,
            'status' => $this->status ,
            'company_id' => $this->company_id ,
            'user_id' => $this->user_id ,
            'date' => $this->date ,
            'time' => $this->time ,
            'branch' => new DefultResource($this->branch) ,
            'company' => new CompanyResourse($this->company),

        ];
    }
}
