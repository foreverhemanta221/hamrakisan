<?php

namespace App\Http\Controllers\Backend\Nepali;

use App\Models\Backend\Product;
use App\Models\Backend\ProductCategory;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getView($id){
        $data = Product::find($id);
        $vendor = Vendor::all();
        $category = ProductCategory::all();
        return view('backend.product.nep_create')->with('item',$data)->with('category',$category)->with('allvendor',$vendor);
    }
    public function translateData(Request $request, $id){
        $product = Product::find($id);
        $product->nep_name = $request->title;
        $product->nep_description = $request->about;
        $product->nep_other_info = $request->label ?  $this->fetchJson($request) : '';
        $product->save();
       return redirect()->route('products.index')->with('success','Updated Successfully');
    }
    public function fetchJson($req){
        if($req->label){
            $data = array();
            foreach ($req->label as $key=>$value){
                //if label and value both exist
                if($req->value[$key] && $req->label[$key]){
                    $data[$req->label[$key]]= $req->value[$key];
                }
            }
            return json_encode($data);
        }
    }
}
