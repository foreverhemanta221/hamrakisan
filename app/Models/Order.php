<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    const ORDER_INITIAL = 'initial';
    const ORDER_PENDING = 'pending';
    const ORDER_DISPATCH = 'dispatch';
    const ORDER_DELIVERED = 'delivered';
    const ORDER_CANCEL = 'cancelled';
    const ORDER_REJECT = 'rejected';
    const ORDER_SUCCESS = 'success';

    protected $guarded = [];

    public function rel_orderItems(){
        return $this->hasMany('App\Models\OrderItem','order_id','id');
    }
    public function rel_farm(){
        return $this->belongsTo('App\Models\Listing','farm_id','id');
    }

    /**
     * Get the user associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
     public function rel_user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function format($status=null){
        return [
            'farm'=>[
                'farm_name'=>$this->rel_farm->name,
                'farm_review'=>$this->rel_farm->getFarmNameAvearageReview(),
                'farm_address'=>$this->rel_farm->short_address,
                'phone'=>$this->rel_farm->phone
            ],
            'user'=>[
                'user_id'=>$this->user_id,
                'name'=>$this->rel_user->name,
                'email'=>$this->rel_user->email,
                'phone'=>$this->rel_user->phone_no,
                'address'=>$this->rel_user->user_address
            ],
            'id'=>$this->id,
            'orderItem'=>$this->order_products($status),
            'payment_method'=>$this->payment_method,
            'status'=>$this->status,
            'ordered_at'=>Carbon::parse($this->created_at)->toFormattedDateString(),
            'price'=>$this->getTotal()
        ];
    }

     public  function order_products($status=null){
        $product=[];
        $totalPrice = 0;
        if($status!=null){
            foreach($this->rel_orderItems->where('remarks',$status) as $item){
                $totalPrice+= $item->price;
                $currentProduct = $item->format();
                array_push($product,$currentProduct);
            }
        }else{
            foreach($this->rel_orderItems as $item){
                $totalPrice+= $item->price;
                $currentProduct = $item->format();
                array_push($product,$currentProduct);
            }
        }
        return [
            'productlist'=>$product,
            'totalPrice'=>$totalPrice
        ];
    }
    public function getTotal(){
        return OrderItem::where('order_id',$this->id)->sum('price');
    }
}
