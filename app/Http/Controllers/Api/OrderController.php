<?php

namespace App\Http\Controllers\Api;

use App\User;
use Exception;
use App\Models\Order;
use App\Models\OrderItem;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Mail\OrderMailToUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\FarmerOrderResource;
use App\Http\Resources\Order\UserOrderResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Modules\Order\Repositories\OrderRepositoryInterface;

class OrderController extends Controller
{
    public $orderRepository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function order(Request $request){
        try{
            // return $request->all();
            DB::transaction(function ()use($request){
                $user = User::find($request->user_id);
    
                if($user->phone_no==null){   
                      return response()->json(['message'=>'Please update phone number with valid details and try again !!!'],500);
                }
               
                // $cart= \Cart::session($user->id);
                // $groupByFarmname =   $cart->getContent()->groupBy('farm_id');
                // $groupByFarmname =   $cart->getContent()->groupBy('farm_id');
                // dd($request->all());
                $order =null;
                
                 foreach($request->data as $data) {
                    //  dd($data['farmId']);
                     $order =   Order::create([
                           'user_id'=>$request->user_id,
                           'payment_method'=>$request->payment_method,
                           'farm_id'=>$data['farmId'],
                           'status'=>Order::ORDER_INITIAL,
                       ]);

                      $orderItems = [];
                      foreach($data['productItem'] as $product) {
                                 OrderItem::create([
                            'order_id'=>$order->id,
                            'product_id'=>$product['id'],
                            'qty'=>$product['noOfItemSelected'],
                            'price'=>$product['totalPrice']/$product['noOfItemSelected'],
                            'remarks'=> OrderItem::ORDER_INITIAL
                            ]);
                        }
                 }

                // message user about order details:
                if($order!==null){
                    if($user->email!=null){
                        // Mail::to($user->email)->send(new OrderMailToUser($order));
                        Mail::to('bindas.prem.75@gmail.com')->send(new OrderMailToUser($order));
                        }
                }
                // foreach($cart->getContent() as $cartItem){
                //     $cart->remove($cartItem->id);
                // }
            });
           
            return response()->json(['message'=>'Order placed successfully, You can check your oders on your dashbord also. Thank you !!!'],200);
        }catch(Exception $ex){
            // dd($ex->getMessage());
            // session()->flash('warning', $ex->getMessage());
             return response()->json(['message'=>$ex->getMessage()],200);
        }
        // return "order placed successfully";
    }

    public function UserAllOrders($user_id){

        $orders = $this->orderRepository->allOrderByUserId($user_id);
        // return($orders);

        // $orders = UserOrderResource::collection($orders);
        // return($orders);

        return  response()->json(['data'=>$orders],200);

    }
    public function FarmerAllOrders($farm_id){

        $orders = $this->orderRepository->allOrderByFarmId($farm_id);
        // return($orders);

        // $orders = FarmerOrderResource::collection($orders);
        // return($orders);

        return  response()->json(['data'=>$orders],200);
    }



    public function userOrderstatus(Request $request){
        return $request->all();
         try{
            DB::transaction(function ()use($request){
                 Order::where('id', $request->orderId)->update([
                    'user_id'=>$request->userId,
                    'status'=>$request->orderStatus,
                    ]);
            });
             return response()->json(['status'=>true],200);
            }catch(Exception $ex){
                return response()->json(['status'=>false,'message'=>$ex->getMessage()],500);
        }
    }
    public function farmOrderstatus(Request $request){
         try{
            DB::transaction(function ()use($request){
                 Order::where('id', $request->orderId)->update([
                    'user_id'=>$request->user_id,
                    'status'=>$request->orderStatus,
                    ]);
            });
             return response()->json(['status'=>true],200);
            }catch(Exception $ex){
                return response()->json(['status'=>false,'message'=>$ex->getMessage()],500);
        }
    }

}
