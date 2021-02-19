<?php


namespace App\Modules\Order\Repositories;


use App\Models\Order;

class OrderServices implements OrderRepositoryInterface
{

    public function allOrder(){
        return Order::orderBy('created_at','desc')
                    ->get();
    }
    public function orderByUserId($user_id){
        return Order::where('user_id',$user_id)
            ->orderBy('created_at','desc')
            ->get()
            ->map->format();
    }
    public function orderByFarmId($farm_id){
        return Order::where('farm_id',$farm_id)
            ->orderBy('created_at','desc')
            ->get();
    }
}
