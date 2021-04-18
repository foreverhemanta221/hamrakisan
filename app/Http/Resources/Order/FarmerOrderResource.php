<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Farm\FarmListResource;
use App\Http\Resources\Order\OrderItemResource;
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
            'userDetail'=>new UserResource($this->rel_user),
            'userDetail'=>new FarmListResource($this->rel_farm),
            'orderStatus'=>$this->status,
            'orderItems'=>new OrderItemResource($this->order_products($this->status)),
            'orderDate'=>$this->created_at->format('Y-M-d'),
        ];
    }
}
