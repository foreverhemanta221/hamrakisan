<?php

namespace App\Http\Controllers\Frontend;

use App\Models\FarmProduct;
use App\Models\FarmProductBook;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductReportController extends Controller
{
    public function allBooking(){

        $listing = Listing::where('user_id',Auth::user()->id)->first();
        $products = FarmProduct::where('farm_id',$listing->id)->first();
        $farmproductBook  = FarmProductBook::whereHas('product',function ($products){
           foreach ($products as $product){
               $product->get();
           }
        })->get();
        return view('frontend.dashboard.order')->with('allbooking',$farmproductBook);




    }
}
