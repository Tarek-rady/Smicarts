<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
           

            'company' => new CompanyResourse($this->company) ,
            'user' => new UserResourse($this->user) ,


        ];
    }
}
