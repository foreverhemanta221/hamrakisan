<?php

namespace App\Http\Resources\FarmProfile;

use Illuminate\Http\Resources\Json\JsonResource;

class FarmSocialInfoResource extends JsonResource
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
            'facebook'=>$this->facebook,
            'twitter'=>$this->twitter,
            'youtube'=>$this->youtube,
            'instagram'=>$this->Instagram,
        ];
    }
}
