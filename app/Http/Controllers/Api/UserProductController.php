<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\FarmProductRequest;
use App\Http\Resources\Farm\FarmProduct\FarmProductResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Helpers;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id =  getUserId($request->header('x-app-token'));
        $listing_count = User::find($user_id)->listings->count();
        if($listing_count<1){
            return response()->json('listing not available',404);
        }
        $product_count = User::find($user_id)->listings->first()->products->count();
        if($product_count<1){
            return response()->json('product not available',400);
        }
        return FarmProductResource::collection(User::find($user_id)->listings->first()->products);



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
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'minimum_quantity'=>'required',
            'measure_unit'=>'required',
            'rate'=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ], 422);
        }

        $user_id =  getUserId($request->header('x-app-token'));
        $listing  = User::findOrFail($user_id)->listings;
        if(!$listing->isEmpty()){
            $listing=$listing->first();
            $listing->products()->create($this->setData($request,$user_id));
            return response()->json(['message'=>'Product Added Successfully'],200);
        }
        return response()->json(['message'=>'You donot have any farm detail'],200);
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
    public function setData($request,$user_id){
        $new_update = [
            'name'=>$request->name,
            'minimum_quantity'=>$request->minimum_quantity,
            'measure_unit'=>$request->measure_unit,
            'price'=> doubleval($request->rate) ,
            'description'=>$request->description
        ];

        if($request->has('image')){
            $new_update['image_id']= Helpers::uploadApiImageToDb($request->image,$user_id);
        }
        return $new_update;
    }
}
