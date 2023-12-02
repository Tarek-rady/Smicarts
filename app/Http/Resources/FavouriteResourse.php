<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavouriteResourse extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'company_id' => $this->company_id ,
            'user_id' => $this->user_id
        ];
    }
}
