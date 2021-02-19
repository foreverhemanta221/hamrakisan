<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const ORDER_INITIAL = 'initial';
    const ORDER_CONFIRMED = 'confirmed';
    const ORDER_PRE_PROCESSING = 'processing';
    const ORDER_SHIPPED = 'shipped';
    const ORDER_DISPATCH = 'dispatch';
    const ORDER_CANCEL = 'cancelled';

    protected $guarded = [];

    public function rel_orderItems(){
        return $this->hasMany('App\Models\OrderItem','order_id','id');
    }
    public function rel_farm(){
        return $this->belongsTo('App\Models\Listing','farm_id','id');
    }

    public function format(){
        return [
            'farm_name'=>$this->rel_farm->name,
            'status'=>$this->status,
            'products'=>$this->rel_orderItems
        ];
    }
}
