<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Order\Repositories\OrderRepositoryInterface;

class OrderController extends Controller
{

    public $orderRepository;
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    
     public function orderstatus(Request $request){
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
                return response()->json(['status'=>false],500);
            // return redirect()->to('my-order');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $orders = $this->orderRepository->allOrder();

        return  view('backend.order.index')
            ->with('allOrders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        if($order){
            return view('backend.order.show')->with('order',$order);
        }
        abort(404);

    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
