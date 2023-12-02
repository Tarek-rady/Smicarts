<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OtpCodeResourse extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ,
            'mobile' => $this->mobile ,
            'otp' => $this->otp

        ];
    }
}
