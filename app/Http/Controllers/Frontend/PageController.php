<?php

namespace App\Http\Controllers\Frontend;

use App\Backend\Faq;
use App\Models\Address;
use App\Models\Backend\Product;
use App\Models\Backend\Training;
use App\Models\Category;
use App\Models\FarmStory;
use App\Models\Listing;
use App\Models\Vendor;
use App\Models\WebSetting\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function getHomePageData(){
        return view('frontend.index');
    }
    public function loadListing($slug){
        $listing = Listing::where('slug',$slug)->first();
        if($listing){
            if( $listing->rel_category!=null){
                $related_listings = $listing->rel_category->listings->except($listing->id)->take(10);
            }else{
                $related_listings = null;
            }
            return view('frontend.farm_detail')->with('listing',$listing)->with('related_listings',$related_listings);
        }
        abort(404);
    }
    public function getallListing(){

    }
    //get district of province
    public  function getDistrictOfProvince($id){
      $district =   checkProvinceDistrict($id);
      if($district){
          return response()->json(['data'=>$district,'status'=>true]);
      }
      return response()->json(['status'=>false]);
    }

    //all category
    public function allcategory(Request $request){
        if($request->ajax()){
            $cat =  Category::get(['id','title']);
            return response()->json($cat);
        }
        abort(404);
    }
    //products
    public function getAllProduct(){
        $product = Product::all();
        return view('frontend.allproducts')->with('allproducts',$product);
    }
    //product detail
    public function getProductDetail($slug){
        $product = Product::where('slug',$slug)->first();
        if($product!=null){
            return view('frontend.product')->with('productdetail',$product);
        }
        abort(404);
    }

    public function getTraining($id){
        $training = Training::findOrFail($id);
        return view('frontend.training')->with('trainingDetail',$training);
    }

    public function about(){
        return view('frontend.about');
    }
    public function faqs(){
        $faqs = Faq::all();
        return view('frontend.faq')->with('allfaq',$faqs);
    }
}
