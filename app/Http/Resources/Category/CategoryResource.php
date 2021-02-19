<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Farm\FarmListResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class CategoryResource extends JsonResource
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
            'title'=>$this->title,
            'nep_title'=>$this->nep_title,
            'image'=> $this->url == null ? null  :URL::asset($this->category_image),
            'farms'=> $this->id ==null ? $this->farms :FarmListResource::collection($this->rel_listing)
        ];

    }
}
