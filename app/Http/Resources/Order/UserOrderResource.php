<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Farm\FarmListResource;
use App\Http\Resources\Order\OrderItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        // dd($this->order_products($this->status));
        // dd($this->order_products($this->orderList()));
        return [
            'orderId'=>$this->id,
            'totalOrderSum'=>$this->getTotal(),
            'userDetail'=>new UserResource($this->rel_user),
            'farmDetail'=>new FarmListResource($this->rel_farm),
            'orderStatus'=>$this->status,
            // 'orderItems'=>new OrderItemResource($this->order_products($this->status)),
            'orderItems'=>OrderItemResource::collection($this->rel_orderItems),
            'orderDate'=>$this->created_at->format('Y-m-d h:i A'),
        ];
    }
}
