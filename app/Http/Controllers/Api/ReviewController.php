<?php

namespace App\Http\Controllers\Api;


use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Listing;
use App\Models\Review;
use App\User;
use App\UserToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public $listing, $user;
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
        $this->user = new User();
    }
    public function index(Request $request, $id){
        $reviews = $this->listing->find($id)->rel_review;
        $average_review = $this->listing->find($id)->rel_review()->where('status',1)->avg('star');
        $myreview = null;
        $this->user->id= $this->user->getUserId($request->header('x-app-token'));
        if($this->user->id!=null){
            $myreview = $this->listing->find($id)->rel_review()->where('user_id',$this->user->id)->first();
        }
        return response()->json(['data'=>[
            'average'=>$average_review,
            'reviews'=>ReviewResource::collection($reviews),
            'my_review'=>$myreview !=null ? new ReviewResource($myreview) : null,

            ],
            'type'=>'get'
        ]);
    }

    public function store(Request $request,$id)
    {
        if($this->user->getUserId($request->header('x-app-token'))==null){
            return response()->json(['message'=>'Login is required','type'=>'post'],200);
        }
        try{
            $this->user->id= $this->user->getUserId($request->header('x-app-token'));
            if($this->listing->find($id)->rel_review()->where('user_id',$this->user->id)->count()>0){
                return response()->json(['message'=>'you already reivewd this farm','type'=>'post'],200);
            }
            DB::transaction(function ()use($request,$id){
                $this->listing->find($id)->rel_review()->create([
                    'user_id'=>$this->user->id,
                    'star'=>$request->star,
                    'description'=>$request->description
                ]);
            });
            return response()->json(['message'=>'Review Posted Successfully','type'=>'post'],200);
        }catch (\PDOException $e){
            return response()->json(['message'=>$e->getMessage(),'type'=>'post'],200);
        }
    }
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
