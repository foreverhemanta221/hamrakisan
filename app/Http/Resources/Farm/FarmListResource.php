<?php

namespace App\Http\Resources\Farm;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FarmListResource extends JsonResource
{
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
