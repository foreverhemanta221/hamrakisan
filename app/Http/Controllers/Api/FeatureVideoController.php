<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\FarmStory\FarmStoryResource;
use App\Models\FarmStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureVideoController extends Controller
{
    public function index(){
        $farmstories = FarmStory::all();
        return response()->json(['data'=>FarmStoryResource::collection($farmstories)]);
    }
    public function show($id){
        $farmStory = FarmStory::find($id);
        if ($farmStory!=null){
            return response()->json(['data'=>new FarmStoryResource($farmStory)],200);
        }
        return response()->json(['error'=>'Not Found'],404);
    }
}
