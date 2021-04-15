<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class FarmerOrderResource extends JsonResource
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
            'orderId'=>$this->id,
            // 'description'=>$this->description,
            // 'price'=>$this->price,
            // 'unit'=>$this->measure_unit,
            // 'feature_image'=>$this->feature_image_small
        ];
    }
}
