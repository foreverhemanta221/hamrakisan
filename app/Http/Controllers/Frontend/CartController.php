<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\FarmProduct;
use App\Models\Listing;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function index()
    {

        // $allcart = \Cart::session(Auth::user()->id)->getContent()->groupBy('farm_id');
        $user = Auth::user();
        if($user){
            $cartItems = \Cart::session($user->id)->getContent();
            // dd($cartItems);
            return view('frontend.cart')->with('cartDetail',$cartItems);
        }
        return abort(404);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()==true){
            if(Auth::user()->role=='user' || Auth::user()->role=='farmer'){
                $cartArray= array();
                foreach($request->productId as $key=>$value){
                    $cartItems = $this->cartItem($value);
                    $cartItems['quantity'] = $request->productQty[$key];
                    array_push($cartArray,$cartItems);
                }
                // dd($cartArray);
                \Cart::session(Auth::user()->id)->add($cartArray);

                return response()->json(['message'=>'Item Added Successfully','status'=>true],200);
            }
        }
        return response()->json(['message'=>'Login is Required','status'=>false],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        $cartItem = $this->cartItem($request->productId);
        $cartItem['quantity']=[
            'relative' => false,
            'value' => $request->productQty
        ];
        \Cart::session(Auth::user()->id)->update($request->productId,$cartItem);
        return response()->json(['status'=>true]);
    }
    public function remove(Request $request)
    {
        \Cart::session(Auth::user()->id)->remove($request->productId);
        // dd($request->all());
        // $cartItem = $this->cartItem($request->productId);
        // $cartItem['quantity']=[
        //     'relative' => false,
        //     'value' => $request->productQty
        // ];
        // \Cart::session(Auth::user()->id)->update($request->productId,$cartItem);
        return response()->json(['status'=>true]);
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

    public function cartItem($productId){
        $product = FarmProduct::findOrFail($productId);
        $other_attributes = [
            'product_image'=>$product->getFeatureImage('small'),
            'farm_reivew'=>$product->getFarmNameAvearageReview(),
            'minimum_order'=>$product->minimum_quantity
        ];
        return [
            'id'=>$productId,
            'name'=>$product->name,
            'price'=>$product->price,
            'farm_id'=>  $product->farm_id,
            'attributes'=>$other_attributes
        ];

    }


}
