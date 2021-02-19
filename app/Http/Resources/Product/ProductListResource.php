<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductListResource extends JsonResource
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
            'productName'=>$this->name,
            'price'=>$this->price,
            'featureImage'=>$this->feature_image_medium,
            'phone'=>$this->vendor_contact
        ];
    }
}
