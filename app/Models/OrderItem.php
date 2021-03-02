<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    const ORDER_INITIAL = 'initial';
    const ORDER_PENDING = 'pending';
    const ORDER_DISPATCH = 'dispatch';
    const ORDER_DELIVERED = 'delivered';
    const ORDER_CANCEL = 'cancelled';
    const ORDER_REJECT = 'rejected';
    const ORDER_SUCCESS = 'success';

    protected $guarded = [];
    protected $table ='orders_items';

    public function rel_products(){
        return $this->belongsTo('App\Models\FarmProduct','product_id','id');
    }
    public function format(){
        if($this->rel_products!=null){
            return [
                'orderDetail'=>[
                    'qty'=>$this->qty,
                    'price'=>$this->price,
                    'remarks'=>$this->remarks
                ],
                'productDetail'=>[
                    'image'=> URL::asset($this->rel_products->getFeatureImage('small')),
                    'name'=> $this->rel_products->name,
                    'minimum_quantity'=> $this->rel_products->minimum_quantity,
                    'measure_unit'=> $this->rel_products->measure_unit,
                    'rate'=> $this->rel_products->price,
                ]
            ];
        }
    }
}
