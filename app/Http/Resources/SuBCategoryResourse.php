<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuBCategoryResourse extends JsonResource
{

    public function toArray($request)
    {


        return [
            'id' => $this->id ,
            'name' => $this->name ,
            'img' => url('Attachments/subCategories/'.$this->img),
            'color' => $this->color,
            'category_id' => $this->category_id ,

            'category' => new DefultResource($this->category) ,

        ];
    }
}
