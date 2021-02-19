<?php

namespace App\Http\Resources\Farm\FarmProduct\Book;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class FarmProductBookResource extends JsonResource
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
            'product_name'=>$this->product->name,
            'quantity'=>$this->quantity,
            'message'=>$this->description,
            'booked_time'=>$this->created_at->diffForHumans(Carbon::now()),
            'ordered_by'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'address'=>$this->s_address." ".$this->city,

        ];
    }
}
