<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests\FarmProductRequest;
use App\Models\FarmProduct;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers;
class FarmProductController extends Controller
{
    public function index($id){
         $listing = Listing::find($id);
         $product = FarmProduct::where('farm_id',$listing->id)->get();
        return view('backend.listing.settings.product.index')->with('products',$product)->with('listing',$listing);
    }
    public function create($id){
        $listing = Listing::find($id);
        return view('backend.listing.settings.product.create')->with('listing',$listing);
    }
    public function store(FarmProductRequest $req,$listing_id){
        $obj = $this->insertOrUpdate($req);
        $obj['farm_id'] = $listing_id;
        FarmProduct::create($obj);
     return redirect()->route('farmproduct.index',$listing_id)->with('success','Product Added Successfully');
    }
    public function edit($id){
        $farmproduct = FarmProduct::find($id);
        return view('backend.listing.settings.product.edit')->with('product',$farmproduct);
    }
    public function insertOrUpdate($req){
        $new_update = [
            'name'=>$req->name,
            'minimum_quantity'=>$req->minimum_quantity,
            'measure_unit'=>$req->measure_unit,
            'price'=> doubleval($req->rate) ,
            'description'=>$req->description,
            'is_available'=>1
        ];
        if($req->has('image')){
            $new_update['image_id']= Helpers::uploadImageToDb($req->image,Auth::user()->id);
        }
        return $new_update;
    }
    public function frontendCreate($id=null){
        $listing = Auth::user()->listings;
        if($id!=null){
            $currentlisting = Listing::where('user_id',$id);
            return view('frontend.dashboard.add-product')->with('listings',$listing)->with('current',$currentlisting);
        }else{
            return view('frontend.dashboard.add-product')->with('listings',$listing);
        }
    }
    public function update(FarmProductRequest $request, $id){
        $product = FarmProduct::find($id);
        $listing_id = $product->listing->id;
        $product->update($this->insertOrUpdate($request));
        return redirect()->route('farmproduct.index',$listing_id)->with('success','Farm product updated successfully');
    }
    public function storeProduct(FarmProductRequest $request){
        $listing  = Auth::user()->listings->first();
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
        $listing->products()->create($new_update);
        return redirect()->route('userdashboard');
    }

}
