<?php

namespace App\Http\Controllers\Backend\Nepali;

use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{
    public function getView($id){

        $listing = Listing::find($id);
        $category = Category::all();
        $province = nepaliProvince();
        return view('backend.listing.nep_create')->with('listing',$listing)->with('category',$category) ->with('province',$province);
    }
    public function translateData(Request $request,$id){
       $listing = Listing::find($id);
       $listing->nep_name = $request->nep_title;
       $listing->nep_about = $request->nep_about;
       $listing->save();
//update on address table
       $address = $listing->address;
       $address->nep_city = $request->city;
       $address->save();
       return redirect()->back()->with('success','Updated');
    }
}
