<?php
namespace App\Http\Controllers\Frontend;
use App\CartItem;
use App\Http\Controllers\Controller;
use App\Models\FarmProduct;
use App\Models\Order;
use App\Models\OrderItem;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
    public function checkout(){
       $totalAmount =   \Cart::session(Auth::user()->id)->getTotal();
        return view('frontend.checkout')->withAmount($totalAmount);
    }
    public function order(Request $request){
        DB::transaction(function ()use($request){
            $cart= \Cart::session(Auth::user()->id);
            $groupByFarmname =   $cart->getContent()->groupBy('farm_id');
            foreach($groupByFarmname as $farmId=>$productArray) {
                // create order Here
                $orders =   Order::create([
                    'user_id'=>Auth::user()->id,
                    'farm_id'=>$farmId,
                    'status'=>Order::ORDER_INITIAL,
                    'payment_method'=>$request->payment_method
                ]);
                $orderItems = [];
                foreach ($productArray as $item) {
                    OrderItem::create([
                        'order_id'=>$orders->id,
                        'product_id'=>$item->id,
                        'qty'=>$item->quantity,
                        'price'=>$item->quantity * $item->price,
                        'remarks'=> OrderItem::ORDER_INITIAL
                    ]);
                }
            }
        });
        return "order placed successfully";
    }
}
