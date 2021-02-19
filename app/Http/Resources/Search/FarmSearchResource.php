<?php

namespace App\Http\Resources\Search;

use Illuminate\Http\Resources\Json\JsonResource;

class FarmSearchResource extends JsonResource
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
            'name'=>$this->name,
            'address'=>$this->short_address,
            'featureImage'=>$this->getFeatureImage('medium'),
            'average_rating'=>3,
            'phone'=>$this->phone,
            'products'=>$this->product_list

        ];
    }
}
