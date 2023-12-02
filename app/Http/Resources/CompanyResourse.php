<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResourse extends JsonResource
{

    public function toArray($request)
    {


        return [
            'id' => $this->id ,
            'name' => $this->company_name ,
            'desc' => $this->desc ,
            'icon' =>url('Attachments/companies/icon/' .$this->icon ) ,
            'cover' =>url('Attachments/companies/cover/' .$this->cover) ,
            'lat' => $this->lat ,
            'lng' => $this->lng ,
            'location' => $this->location ,
            'city_id' => $this->city_id ,
            'payment_type' => $this->payment_type ,
             'price' => $this->price ,

            'category_id' => $this->category_id ,
            'subcategory_id' => $this->subcategory_id ,
            'rate' => $this->rate ,
            'is_favourite' => $this->is_favourite ,

            'city' => new DefultResource($this->city) ,
            'category' =>new DefultResource($this->category ),
            'subcategory' => new DefultResource($this->subcategory) ,

            'branches' => DefultResource::collection($this->branches) ,
            'services' => ServicesResourse::collection($this->services)


        ];
    }
}
