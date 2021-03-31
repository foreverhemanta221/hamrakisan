<?php
namespace App\Http\Controllers\Frontend;
use App\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\FarmProduct;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Mail\OrderMailToUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function checkout(){
       $totalAmount =   \Cart::session(Auth::user()->id)->getTotal();
        return view('frontend.checkout')->withAmount($totalAmount);
    }
    public function order(Request $request){
        try{
            if(Auth::user()->phone_no==null){   
                session()->flash('danger', "Please update phone number with valid details and try again !!!");
                return redirect()->to('/myaccount');
            }
            DB::transaction(function ()use($request){
                $user =Auth::user();
                $cart= \Cart::session($user->id);
                $groupByFarmname =   $cart->getContent()->groupBy('farm_id');
                $order =null;

                //when cart is empty ??
                // if($groupByFarmname->count()==0){
                //     // session()->flash('danger', 'your cart is empty !!');
                //     return redirect()->to('/')->with('danger', 'your cart is empty !!');
                // }
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
           
            session()->flash('message',"Order placed successfully, You can check your oders on your dashbord also. Thank you !!!");
            return redirect()->to('/dashboard');
        }catch(Exception $ex){
            // dd($ex->getMessage());
            // session()->flash('warning', $ex->getMessage());
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
    public function changestatus(Request $request){
        try{
            DB::transaction(function ()use($request){
                 Order::where('id', $request->orderId)->update([
                    'user_id'=>Auth::user()->id,
                    'status'=>$request->orderStatus,
                    ]);
            });
            session()->flash('message',"Order status changed successfully !!!");
             return response()->json(['status'=>true],200);
        }catch(Exception $ex){
            session()->flash('warning', "Please try again later !!!");
            return redirect()->to('my-order');
        }
        // return "order placed successfully";
    }
}
