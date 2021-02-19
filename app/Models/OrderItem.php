<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    const ORDER_INITIAL = 'initial';
    const ORDER_CONFIRMED = 'confirmed';
    const ORDER_PRE_PROCESSING = 'pre-processing';
    const ORDER_PROCESSING = 'processing';
    const ORDER_HOLD = 'hold';
    const ORDER_SHIPPED = 'shipped';
    const ORDER_DISPATCH = 'dispatch';
    const ORDER_CANCEL = 'cancelled';

    protected $guarded = [];

    public function rel_products(){
        return $this->belongsTo('App\Models\FarmProduct','product_id','id');
    }
}
