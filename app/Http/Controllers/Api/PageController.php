<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Banner\BannerResource;
use App\Http\Resources\Farm\FarmDetailResource;
use App\Models\Listing;
use App\Models\Review;
use App\Models\WebSetting\Banner;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function farmDetail($id){
        $listing = Listing::find($id);
        return response()->json(['data'=> new FarmDetailResource($listing)],200);
    }
    public function farmReviews($id){
        $review = Review::where('listing_id',$id)->first();
    }
    public function getAllBanner(){
        $banner = Banner::all();
        return response()->json(['data'=>BannerResource::collection($banner)],200);
    }



}
