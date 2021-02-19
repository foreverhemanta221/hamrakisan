<?php
namespace App;


class Cart extends CartItem
{

    const DEFAULT_INSTANCE = 'default';


    public $items =null;
    public function __construct($oldCart)
    {
//        if()
    }


    public function add($item,$itemId){
        $storeditem = [
                        'farmId'=>$item['farmId'],
                        'productId'=>$item['productId'],
                        'productQty'=>$item['productQty'],
                        'productPrice'=>$item['productPrice']
                     ];
    }
}
