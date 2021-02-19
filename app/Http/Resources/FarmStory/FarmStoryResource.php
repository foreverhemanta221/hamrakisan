<?php

namespace App\Http\Resources\FarmStory;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FarmStoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'imageUrl'=>$this->feature_image,
            'videoUrl'=>$this->video
        ];
    }
}
