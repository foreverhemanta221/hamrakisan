<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Order\Repositories\OrderRepositoryInterface;

class UserDashboardController extends Controller
{
    public $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getUserDashboard(){
        
        $myorder = $this->orderRepository->orderByUserId(Auth::user()->id)->take(5);
        // dd($myorder);
        if($myorder){
            return view('frontend.user.dashboard')->with('orders',$myorder);
        }
        abort(404);
    }

    
}
