<?php

namespace App\Http\Resources\Order;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
        // return parent::toArray($request);
        // dd($this);
         return [
            'orderItemId'=>$this->id,
            "noOfItemSelected"=> $this->qty,
            "totalPrice"=> $this->price,
            "status"=> $this->remarks,
            "image"=> URL::asset($this->rel_products->getFeatureImage('small')),
            "name"=> $this->rel_products->name,
            "minimum_quantity"=> $this->rel_products->minimum_quantity,
            "measure_unit"=>  $this->rel_products->measure_unit,
            "rate"=> $this->rel_products->price,
        ];
    }
}
