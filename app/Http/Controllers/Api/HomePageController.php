<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\Banner\BannerResource;
use App\Http\Resources\Farm\FarmListResource;
use App\Http\Resources\Product\ProductListResource;
use App\Models\Backend\Product;
use App\Models\Listing;
use App\Models\WebSetting\Banner;

class HomePageController extends Controller
{
    public function getFeatureFarm(){
        $listing = Listing::where([
                    ['featured','=',1],
                    ['status','=',1]
        ])->get();
        return response()->json(['data'=>FarmListResource::collection($listing)],200);
    }
    public function getFeatureProduct(){
        $product = Product::all();
        return response()->json(['data'=>ProductListResource::collection($product)],200);
    }
    public function getFeatureTraining(){
        return response()->json(['data'=>[]],200);
    }
    public function getAllBanner(){
        $banner = Banner::all();
        if($banner!=null){
            $data =  BannerResource::collection($banner);
            return response()->json(['data'=>$data],200);
        }
        return response()->json(['data'=>null]);
    }
}
