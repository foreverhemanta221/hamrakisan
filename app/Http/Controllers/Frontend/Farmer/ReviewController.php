<?php

namespace App\Http\Controllers\Frontend\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(){
        if(Auth::user()->rel_listing->count()>0){
            $allreview = Auth::user()->rel_listing->first()->rel_review->sortByDesc('created_at');
            return view('frontend.farmer.farm.review.index')->with('reviews',$allreview);
        }
    }
    public function changeStatus(Request $request){
        if($request->ajax()){
            Review::find($request->reiview_id)->update([
                'status' => $request->status
            ]);
            $current_staus = $request->status == 0 ? 'Disapproved ' :'Approved ';
            return response()->json(['success'=>$current_staus ."Successfully"]);
        }

    }
}
