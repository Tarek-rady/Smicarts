<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResourse extends JsonResource
{

    public function toArray($request)
    {


        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'color' => $this->color ,
            'img' => url('Attachments/categories/'.$this->img) ,
        ];
    }
}
