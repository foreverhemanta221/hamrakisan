<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use App\User;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    public $user;
    public function __construct(Request $request)
    {
        $this->user = User::find(getUserId($request->header('x-app-token')));
    }
    public function index()
    {
        $user_reviews = Review::where('user_id',$this->user->id)->get();
        return response()->json(['data'=> ReviewResource::collection($user_reviews)]);
    }
    
    public function store(Request $request)
    {
        //
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
