<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TermsResourse extends JsonResource
{

    public function toArray($request)
    {
        return [
            'desc' => $this->desc ,
        ];
    }
}
