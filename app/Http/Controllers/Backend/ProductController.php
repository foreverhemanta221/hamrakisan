<?php

namespace App\Http\Controllers\Backend;

use App\Cart;
use App\Http\Requests\ProductRequest;
use App\Models\Backend\Product;
use App\Models\Backend\ProductCategory;
use App\Models\Category;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers;

class ProductController extends Controller
{
    public function index()
    {
        $allproduct = Product::all();
        return view('backend.product.index')->with('products',$allproduct);

    }
    public function create()
    {
        if(Vendor::count()==0)
            return redirect()->route('vendor.create')->with('danger','There are no vendor Detail .. please create it first');
        if(ProductCategory::count()==0)
            return redirect()->route('productcategory.create')->with('danger','There are no Product Category .. please create it first');
        $productcategory = ProductCategory::all();
        $vendor = Vendor::all();
        return view('backend.product.create')->with('category',$productcategory)->with('allvendor',$vendor);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $insert = $this->insertOrUpdate($product,$request);
        //feature image
        if($request->has('image')){
            $insert->image_id =  Helpers::uploadImageToDb($request->image);
        }
        $insert->save();
        //gallery_image
        if($request->gallery_image){
            $image_ids = [];
            $gallery = (array) $request->gallery_image;
            if(count($gallery)>0){
                foreach ( array_slice($gallery, 0, 4)  as $image ) {
                    $uploaded = Helpers::uploadImageToDb($image);
                    $image_ids[] =$uploaded ? $uploaded : null;
                }
                $image_ids = array_filter($image_ids);
                // Attach
                if (count($image_ids) > 0)
                    $insert->images()->attach($image_ids);
            }
        }
        return redirect()->route('products.index')->with('success','Product Added Successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = ProductCategory::all();
        $vendor = Vendor::all();
        return view('backend.product.edit')->with('productedit',$product)->with('allcategory',$category)->with('allvendor',$vendor);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $old_image_id = $product->image_id;
        $update = $this->insertOrUpdate($product,$request);
        $update->save();

        if($request->image){
            $product->image_id =  Helpers::uploadImageToDb($request->image,Auth::user()->id);
            $product->update();
            Helpers::delete_image_byId($old_image_id);
        }
        return redirect()->route('products.index')->with('success','Product Updated Successfully');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $product = Product::find($id)->delete();
            $request->session()->put('success','Product Deleted Successfully');
            return response()->json(['status'=>true],200);
        }
    }
    public function insertOrUpdate($obj,$req){
        $obj->name = $req->title;
        $obj->category_id = $req->category;
        $obj->vendor_id = $req->vendor;
        $obj->slug =  $req->slug ?  $req->slug :  str_replace(' ','_',trim($req->title));
        $obj->price = $req->price;
        $obj->measure_unit = $req->measure_unit;
        $obj->description = $req->about;
        $obj->other_info = $req->label ? $this->fetchJson($req):'';
        return $obj;

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

    public function getProductDetail($slug){
        $product =   Product::where('slug',$slug)->first();
        if($product){
            return view('frontend.hamrakisan.product-detail')->with('product',$product);
        }
    }

    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        if(!$product)abort(404);
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        $request->session()->put('cart',$cart);
        return redirect()->back();

    }

    public function getCart(){
        if(! Session::has('cart')){
            return view('frontend.hamrakisan.shopping-cart',['products'=>null]);
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        return view('frontend.hamrakisan.shopping-cart',['products'=>$cart->items,'totalprice'=>$cart->totalPrice]);
    }

}
