<?php

namespace App\Http\Resources\Farm\FarmProduct;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FarmProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'measure_unit'=>$this->measure_unit,
            'minimum_quantity'=> (int)$this->minimum_quantity,
            'is_available'=>$this->is_available ==1 ? 'on' :'off',
            'image'=>$this->getFeatureImage('medium'),
        ];
    }
}
