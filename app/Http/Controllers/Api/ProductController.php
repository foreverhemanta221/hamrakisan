<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Product\ProductDetailResource;
use App\Http\Resources\Product\ProductListResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\ProductCategory\ProductCategoryResource;
use App\Models\Backend\Product;
use App\Models\Backend\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        $data = ProductListResource::collection($product);
        return  response()->json(['data'=>$data],200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if($product!=null){
             $data =  new ProductDetailResource($product);
             return response()->json(['data'=>$data],200);
        }
        return response()->json(['data'=>'Not Found'],404);
    }





    public function allproductCategoryList(){
        $product_cateogry = ProductCategory::all();
        if($product_cateogry!=null){
            $data = ProductCategoryResource::collection($product_cateogry);
        }else{
            $data = null;
        }
        return response()->json(['data'=>$data],200);

    }
}
