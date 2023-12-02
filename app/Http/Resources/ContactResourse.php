<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResourse extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'mobile' => $this->mobile ,
            'message' => $this->message ,
            'complaintType' => $this->complaint_type ,
            'img' => url('Attachments/contacts/'.$this->img) ,
        ];
    }
}
