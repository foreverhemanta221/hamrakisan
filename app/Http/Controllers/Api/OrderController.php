<?php

namespace App\Http\Controllers\Api;

use App\User;
use Exception;
use App\UserToken;
use App\Models\Order;
use App\Models\OrderItem;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Mail\OrderMailToUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\Order\UserOrderResource;
use App\Http\Resources\Order\FarmerOrderResource;
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
                        Mail::to($user->email)->send(new OrderMailToUser($order));
                        // Mail::to('bindas.prem.75@gmail.com')->send(new OrderMailToUser($order));
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

    public function UserAllOrders(Request $request){
        $user_id = $this->getUserId($request->header('x-app-token'));
        $orders = $this->orderRepository->allOrderByUserId($user_id);
        $orders = UserOrderResource::collection($orders);

        return  response()->json(['data'=>$orders],200);

    }

    public function UserOrderDetail($order_id){
        
        $order= Order::find($order_id);
        if($order){
            $data = new UserOrderResource($order);
            return  response()->json(['data'=>$data],200);
        }
    }

    public function FarmerAllOrders($user_id){
        $user = User::find($user_id);

        if($user){
            $farm=$user->listed_farm;
            if($farm){
                $orders = $this->orderRepository->allOrderByFarmId($farm->id);
                $orders = FarmerOrderResource::collection($orders);
                return  response()->json(['data'=>$orders],200);
            }
            return  response()->json(['data'=>'No Farm Listed Yet'],500);
        }
        return  response()->json(['data'=>'Invalid User fetched'],403);
    
        // return($orders);
        // abort(503);
    }



    public function userOrderstatus(Request $request){
        // return $request->all();
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

    public function getUserId($token){
        $user_token = UserToken::where('api_token',$token)->first();
        if($user_token!=null){
            $user_id = $user_token->user_id;
            return $user_id;
        }
    }

}
