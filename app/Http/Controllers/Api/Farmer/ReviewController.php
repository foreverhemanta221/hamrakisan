<?php

namespace App\Http\Controllers\Api\Farmer;

use App\Http\Controllers\Controller;
use App\Http\Resources\Farm\FarmProduct\FarmProductResource;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public $user;
    public function __construct(Request $request)
    {
        $this->user = User::find(getUserId($request->header('x-app-token')));
    }
    public function index(Request $request)
    {
        $key = $request->key;
        if($this->user->rel_listing->count()>0){
            try{
                $user= Auth::user();
                //check farm id
                $farm = $this->user->rel_listing->first();
                if($farm==null){
                    return response()->json(['data'=>'No any farm listed yet'],200);
                }
                if($key!=null){
                    $review = Review::where('farm_id',$farm->id)->search($key)->get();
                }else{
                    $review = $this->user->rel_listing->first()->rel_review;
                }

                return response()->json(['data'=>ReviewResource::collection($review)],200);
            }catch (\PDOException $e){
                return response()->json(['message'=>'something went wrong'],400);
            }

        }
    }

    public function ChangeStatus(Request $request){
        //TODO::check if review is related to myfarmorNot
        $reviewId = $request->reviewId;
        $activeStatus = $request->activeStatus;
        $review = Review::find($reviewId);
        if($review!=null){
            $review->update([
                'status'=>$activeStatus
            ]);
            $text = $activeStatus==1 ? 'approved' : 'disapprove';
            return response()->json(['message'=>'review '.$text.' successfully'],200);
        }
        return response()->json(['message'=>'something is wrong'],200);


    }

    public function destroy($id)
    {
        //
    }
}
