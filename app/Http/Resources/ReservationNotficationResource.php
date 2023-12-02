<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationNotficationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->data['title'],
            'user' => $this->data['user'],
            'order_id' => $this->data['order_id'],
            'created_at' => date('d-m-Y h:i A', strtotime($this->created_at))
            
        ];

    }
}
