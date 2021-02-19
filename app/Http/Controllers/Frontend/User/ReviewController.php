<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(){

        $getReview = Review::where('user_id',Auth::id())->get();
//        dd($getReview->first()->rel_listing->getGalleryImage('small'));
        return view('frontend.user.review')->with('myreviews',$getReview);
    }
}
