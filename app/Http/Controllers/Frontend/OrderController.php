<?php
namespace App\Http\Controllers\Frontend;
use App\CartItem;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Exception;
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
        try{
            DB::transaction(function ()use($request){
                $cart= \Cart::session(Auth::user()->id);
                // dd($cart->getContent());
            $groupByFarmname =   $cart->getContent()->groupBy('farm_id');
            // dd($groupByFarmname);
            foreach($groupByFarmname as $farmId=>$productArray) {
                // dd($farmId);
                // create order Here
                // dd($request->payment_method);
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
                $cart->remove($request->productId);
            });
            session()->flash('message',"Order placed successfully, You can check your oders on your dashbord also. Thank you !!!");
            return redirect()->back();
        }catch(Exception $ex){
            session()->flash('warning', "Order could not be placed,Please try again later !!!");
            return redirect()->to('mycart');
        }
        // return "order placed successfully";
    }
    public function orderCancel(Request $request,$order_id){
        try{
            DB::transaction(function ()use($request,$order_id){
                 Order::where('id', $order_id)->update([
                    'user_id'=>Auth::user()->id,
                    'status'=>Order::ORDER_CANCEL,
                    ]);
            });
            session()->flash('message',"Order cancelled successfully !!!");
            return redirect()->back();
        }catch(Exception $ex){
            session()->flash('warning', "Please try again later !!!");
            return redirect()->to('my-order');
        }
        // return "order placed successfully";
    }
}
