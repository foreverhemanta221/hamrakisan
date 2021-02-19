<?php

namespace App\Http\Resources\Banner;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class BannerResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'image_url'=> URL::asset($this->rel_image->image),
        ];
    }
}
