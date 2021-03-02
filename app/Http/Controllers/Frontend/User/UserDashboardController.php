<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Modules\Order\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getUserDashboard(){
        $myorder = $this->orderRepository->orderByUserId(Auth::user()->id);
        // dd($myorder);
        // $myorder = $this->orderRepository->allOrder();
        // dd($myorder);
        return view('frontend.user.dashboard')->with('orders',$myorder);
    }
}
