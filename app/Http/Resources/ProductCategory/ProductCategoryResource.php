<?php

namespace App\Http\Resources\ProductCategory;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
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
            'title'=>$this->name,
            'nep_title'=>$this->nep_name,
            'description'=>$this->description,
            'products'=> $this->products !=null ?  ProductResource::collection($this->products) : null
        ];
    }
}
