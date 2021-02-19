<?php

namespace App\Http\Resources\Training;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingListResource extends JsonResource
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
            'id'=>$this->id,
            'featureImage'=>$this->medium_thumbnail_image,
            'shortDescription'=> strip_tags($this->features),
            'price'=>$this->price,
            'date'=>$this->upcomming_date
        ];
    }
}
