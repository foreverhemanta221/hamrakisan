<?php

namespace App\Http\Controllers\Backend\Nepali;

use App\Models\Backend\Product;
use App\Models\FarmProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmProductController extends Controller
{
    public function getView($id){
        $product = FarmProduct::find($id);
        return view('backend.listing.settings.product.nep_product')->with('product',$product);
    }
    public function translateData(Request $request,$id){
        $this->validate($request,[
           'nep_name'=>'required',
           'nep_description'=>'required',
        ]);
        $product = FarmProduct::find($id);
        FarmProduct::where('id',$id)->update([
            'nep_name'=>$request->nep_name,
            'nep_description'=>$request->nep_description,
        ]);
        $listing_id = $product->listing->id;

        return redirect('listing/farmproduct/'.$listing_id)->with('success','Prouct successfully translated into nepali');
    }
}
