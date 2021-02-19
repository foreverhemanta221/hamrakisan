<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\FarmProductRequest;
use App\Models\Backend\Product;
use App\Models\FarmProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listing = Auth::user()->listings->first();
        if($listing){
            return view('frontend.dashboard..add-product')->with('listing',$listing);
        }
        return redirect()->back()->with('success','yoou must insert listing detail first');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmProductRequest $request)
    {
        $listing  = Auth::user()->listings->first();
        $listing->products()->create($this->setData($request));
        return redirect()->route('userdashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listing = Auth::user()->listings->first();
        $listing_id = $listing->id;
        if(FarmProduct::where([['id','=',$id],['farm_id','=',$listing_id]])->count() >0){
            return view('frontend.dashboard.edit-product')->with('product',FarmProduct::find($id));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FarmProductRequest $request, $id)
    {
        $listing  = Auth::user()->listings->first();
        $product = FarmProduct::find($id);
        $product->update($this->setData($request));
        return redirect('/frontend/dashboard/view-products')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $product = FarmProduct::find($id)->delete();
            if($product->delete()){
                $request->session()->flash('success', 'Product Deleted Successfully.');
                return response()->json(['status' => true]);
            }
            $request->session()->flash('success', 'Product Cannot Deleted.');
            return response()->json(['status' => false]);
        }

    }

    public function setData($request){
        $new_update = [
            'name'=>$request->name,
            'minimum_quantity'=>$request->minimum_quantity,
            'measure_unit'=>$request->measure_unit,
            'price'=> doubleval($request->rate) ,
            'description'=>$request->description
        ];

        if($request->has('image')){
            $new_update['image_id']= Helpers::uploadImageToDb($request->image,Auth::user()->id);
        }
        return $new_update;
    }

    public function translateView($id){
        $listing = Auth::user()->listings->first();
        $listing_id = $listing->id;
        if(FarmProduct::where([['id','=',$id],['farm_id','=',$listing_id]])->count() >0){
            return view('frontend.dashboard.translate-product')->with('product',FarmProduct::find($id));
        }

    }
    public function translate(Request $request,$id){
        $product = FarmProduct::find($id);
        $product->nep_name=$request->name;
        $product->nep_description=$request->nep_description;
        $product->save();


        return redirect('/frontend/dashboard/view-products')->with('success','Translated Successfully');
    }
}
