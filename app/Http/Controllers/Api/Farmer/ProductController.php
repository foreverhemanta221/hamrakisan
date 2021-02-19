<?php

namespace App\Http\Controllers\Api\Farmer;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\Farm\FarmProduct\FarmProductResource;
use App\Http\Resources\Product\ProductDetailResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public $user;
    public function __construct(Request $request)
    {
        $this->user = User::find(getUserId($request->header('x-app-token')));
    }
    public function index()
    {
        if($this->user->rel_listing->count()>0){
            try{
                $user= Auth::user();
                $listing = $this->user->rel_listing->first();
                return response()->json(['data'=>FarmProductResource::collection($listing->products)],200);
            }catch (\PDOException $e){
                return response()->json(['message'=>'something went wrong'],400);
            }

        }
    }

    public function store(Request $request)
    {
        if($this->user->rel_listing->count()>0){
            try{
                DB::transaction(function () use ($request) {
                    $user= Auth::user();
                    $listing = $this->user->rel_listing->first();
                    $listing->products()->create($this->setData($request));
                });
            }catch (\PDOException $e){
                dd($e->getMessage());
            }
            return response()->json(['message'=>'Farm Product Addedd Successfully'],200);
        }
        return response()->json(['error'=>'You donot have any listed farm'],200);
    }

    public function update(Request $request, $id)
    {
        if($this->user->rel_listing->count()>0){
            try{
                DB::transaction(function () use ($request,$id) {
                    $listing = $this->user->rel_listing->first();
                    if($listing->products->where('id',$id)->first()!=null){
                        $listing->products->where('id',$id)->first()->update($this->setData($request));
                    };
                });
            }catch (\PDOException $e){
                return response()->json(['message'=>$e->getMessage()],400);
            }
            return response()->json(['message'=>'Farm Product Updated Successfully'],200);
        }
        return response()->json(['error'=>'You donot have any listed farm'],200);
    }

    public function show($id){
        $listing = $this->user->rel_listing->first();
        $product = $listing->products->where('id',$id);
        if($product!=null){
            $product = $product->first();
            return response()->json(['data'=>new FarmProductResource($product)]);
        }

    }

    public function destroy(Request $request, $id)
    {
        $listing = $this->user->rel_listing->first();
        $product = $listing->products->where('id',$id);
        if($product!=null){
            $product = $product->first()->delete();
            return response()->json(['message'=>'product delete successfully'],200);
        }
    }

    public function setData($request){
        $data = [
            'name'=>$request->name,
            'minimum_quantity'=>$request->minimum_quantity,
            'price'=>$request->price,
            'measure_unit'=>$request->measure_unit,
        ];
        if($request->image){
            $data['image_id'] =Helpers::uploadApiImageToDb($request->image);
        }
        if($request->is_available){
            $data['is_available'] = $request->is_available =="on" ? '1' : 0;
        }
        return $data;
    }
}
