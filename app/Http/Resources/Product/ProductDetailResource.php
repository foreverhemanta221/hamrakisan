<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>strip_tags($this->description),
            'price'=>$this->price,
            'unit'=>$this->measure_unit,
            'product_detail'=>  json_decode($this->other_info) == [] ? null : json_decode($this->other_info) ,
            'gallery_image'=>$this->getGalleryImage(),
            'vendorName'=>$this->vendor_name,
            'vendorPhone'=>$this->vendor_contact,
            'vendorEmail'=>$this->vendor_email,
            'availability'=>'available all over nepa',

        ];
    }
}
