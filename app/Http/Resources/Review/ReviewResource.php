<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'userName'=>$this->rel_user!=null ?  $this->rel_user->name : '',
            'star'=>$this->star,
            'description'=>$this->description,
            'status'=>$this->status
        ];
    }
}
