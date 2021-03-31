<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Order;
use App\Models\OrderItem;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request){
        try{
            if(Auth::user()->phone_no==null){   
                  return response()->json(['message'=>'Please update phone number with valid details and try again !!!'],500);
            }
            DB::transaction(function ()use($request){
                $user =Auth::user();
                $cart= \Cart::session($user->id);
                $groupByFarmname =   $cart->getContent()->groupBy('farm_id');
                $order =null;

                
                foreach($groupByFarmname as $farmId=>$productArray) {
                    $order =   Order::create([
                        'user_id'=>$user->id,
                        'farm_id'=>$farmId,
                        'status'=>Order::ORDER_INITIAL,
                        'payment_method'=>$request->payment_method
                    ]);
                    $orderItems = [];
                    foreach ($productArray as $item) {
                        OrderItem::create([
                        'order_id'=>$order->id,
                        'product_id'=>$item->id,
                        'qty'=>$item->quantity,
                        'price'=>$item->quantity * $item->price,
                        'remarks'=> OrderItem::ORDER_INITIAL
                        ]);
                    }
                }
                
                // dd($order->format());

                // message user about order details:
                if($order!==null){
                    if($user->email!=null){
                        Mail::to($user->email)->send(new OrderMailToUser($order));
                        }
                }
                foreach($cart->getContent() as $cartItem){
                    $cart->remove($cartItem->id);
                }
            });
           
            return response()->json(['message'=>'Order placed successfully, You can check your oders on your dashbord also. Thank you !!!'],200);
        }catch(Exception $ex){
            // dd($ex->getMessage());
            // session()->flash('warning', $ex->getMessage());
             return response()->json(['message'=>$ex->getMessage()],200);
        }
        // return "order placed successfully";
    }
}
