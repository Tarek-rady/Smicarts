<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResourse extends JsonResource
{

    public function toArray($request)
    {

        return [

            'id' => $this->id ,
            'name' => $this->name ,
            'email' => $this->email ,
            'mobile' => $this->mobile ,
            'img' => url('Attachments/users/' . $this->img) ,
            'is_complete' => $this->is_complete ,
            'device_key' => $this->device_key

        ];
    }
}
