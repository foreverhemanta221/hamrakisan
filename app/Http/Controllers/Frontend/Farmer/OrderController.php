<?php

namespace App\Http\Controllers\Frontend\Farmer;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Modules\Order\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public $orderRepository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function farmOrder(){

        $farm = Auth::user()->listed_farm;
        if($farm){
            $allOrders = $allOrders = $this->orderRepository->orderByFarmId($farm->id);
            // dd($allOrders);
            $initialOrder = $this->orderRepository->getFarmorderByStatus($farm->id,Order::ORDER_INITIAL);
            $pendingOrder = $this->orderRepository->getFarmorderByStatus($farm->id,Order::ORDER_PENDING);
            $dispatchedOrder = $this->orderRepository->getFarmorderByStatus($farm->id,Order::ORDER_DISPATCH);
            $deliveredOrder = $this->orderRepository->getFarmorderByStatus($farm->id,Order::ORDER_DELIVERED);
            
            return view('frontend.farmer.order')->with('initialOrder',$initialOrder)
            ->with('pendingOrder',$pendingOrder)
            ->with('dispatchOrder',$dispatchedOrder)
            ->with('deliveredOrder',$deliveredOrder)
            ->with('orders',$allOrders);
        }
        return redirect()->to('myfarm')->with('danger',"You have to list you farm first");
    }

     public function viewFarmOrders($id){
        $order = Order::find($id);
        if($order){
            return view('frontend.farmer.orderDetail')->with('order',$order);
        }
        abort(404);
    }

    public function changeStatus(Request $request){
        $farm_id = Auth::user()->rel_listing->id;
        $change = $this->orderRepository->changeStatus($request->orderId,$request->orderStatus);
        if($change==true){
            return response()->json(['message'=>'Order Status Changed Successfully','status'=>true],200);
        }
        return response()->json(['message'=>'Order Status Changed Successfully','status'=>false],200);
    }

}
