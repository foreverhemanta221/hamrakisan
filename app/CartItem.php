<?php

namespace App;

use Illuminate\Support\Facades\Session;

class CartItem
{
    public $items= [];
    public $totalItems = 0;
//    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart!=null){
            $this->items = $oldCart->items;
            $this->totalItems = $oldCart->totalItems;
//            $this->totalPrice = $oldCart->totalPrice;
        }else{
            $this->items = [];
            $this->totalItems = 0;

        }
    }
    public function add($product,$product_id,$product_qty=null){
        $storedItem = ['farmId'=>$product->farm_id,'farmName'=>$product->getFarmName(),'farmReview'=>$product->getFarmNameAvearageReview(),'productId'=>$product_id,'productQty'=>$product_qty,'productPrice'=>$product->price*$product_qty,'product'=>$product];

        if($this->items){
            if(array_key_exists($product_id,$this->items)){
                    $storedItem = $this->items[$product_id];
            }
        }
        $this->items[$product_id]= $storedItem;
        $this->totalItems+=1;
    }
    public function update($product,$productId,$product_qty){
        $storedItem = ['farmId'=>$product->farm_id,'farmName'=>$product->getFarmName(),'farmReview'=>$product->getFarmNameAvearageReview(),'productId'=>$productId,'productQty'=>$product_qty,'productPrice'=>$product->price*$product_qty,'product'=>$product];
        if($this->items){
            if(array_key_exists($productId,$this->items)){
                 $this->items[$productId]= $storedItem;
            }
        }
    }

}
