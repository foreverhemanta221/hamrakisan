<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Order\Repositories\OrderRepositoryInterface;

class OrderConroller extends Controller
{
    public $orderRepository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function myOrder(){
        $initial_order = $this->orderRepository->getUserOrderByStatus(Auth::user()->id,OrderItem::ORDER_INITIAL);
        $dispatch_order = $this->orderRepository->getUserOrderByStatus(Auth::user()->id,OrderItem::ORDER_DISPATCH);
        $delivered_order = $this->orderRepository->getUserOrderByStatus(Auth::user()->id,OrderItem::ORDER_DELIVERED);
        $cancel_order = $this->orderRepository->getUserOrderByStatus(Auth::user()->id,OrderItem::ORDER_CANCEL);
        $rejected_order = $this->orderRepository->getUserOrderByStatus(Auth::user()->id,OrderItem::ORDER_REJECT);
        $cancelled_order = array_merge($cancel_order->toArray(),$rejected_order->toArray());

         $allOrders = $this->orderRepository->orderByUserId(Auth::user()->id);

        return view('frontend.user.order')->with('initialOrder',$initial_order)
                                            ->with('dispatchOrder',$dispatch_order)
                                            ->with('deliveredOrder',$delivered_order)
                                            ->with('cancelOrder',$cancelled_order)
                                            ->with('orders',$allOrders);

    }

    public function viewmyOrder($id){
        $order = Order::find($id);
        if($order){
            return view('frontend.user.orderDetail')->with('order',$order);
        }
        abort(404);
    }


}
