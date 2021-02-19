<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Farm\FarmListResource;
use App\Http\Resources\FarmStory\FarmStoryResource;
use App\Http\Resources\Setting\CategoryCollection;
use App\Http\Resources\Setting\CategoryResource;
use App\Http\Resources\Setting\ProductCategoryListResource;
use App\Models\Backend\ProductCategory;
use App\Models\Category;
use App\Models\FarmStory;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function getCategories(){
        $cat =  Category::all();
        $data = CategoryResource::collection($cat);
        if($cat!=null){
            return response()->json(['data'=>$data],200);
        }
        return response()->json(['data'=>null]);
    }

    public function getProvinces(){
        $provinces = getProvince();
        $data = [];
        $i=0;
        foreach ($provinces as $key=>$value){
            $data[$i]['province_id']= $key;
            $data[$i]['province']= $value;
            $i++;
        }
        return response()->json(['data'=>$data],200);
    }

    public function getDistricts(){
        $districts = getDistrict();
        $data = [];
        $i=0;
        foreach($districts as $key=>$value){
            $data[$i]['district_id']=$key;
            $data[$i]['district_name']=$value;
            $data[$i]['province_id']= checkDistrictProvince($key);
            $i++;
        }
        return response()->json(['data'=>$data],200);
    }

    public function getProvinceById($id){
        $province = check_province($id);
        return response()->json(['data'=>$province],200);
    }

    public function getProvinceDistrict($id){
        $district = checkProvinceDistrict($id);
        return response()->json(['data'=>$district],200);
    }

    //for test
    public function getOneDistricts($id){
       return checkDistrictProvince($id);
    }

    //all farm stories
    public function allFarmStorires(){
      $farm_story =  FarmStory::all();
      $data = FarmStoryResource::collection($farm_story);
      return response()->json(['data'=>$data],200);
    }

    public function getFarmStory($id){
        $story = FarmStory::find($id);
        if($story !=null){
            $data = new FarmStoryResource($story);
            return response()->json(['data',$data],200);
        }
        return response()->json(null,404);
    }

    public function allCategory(){
        $listing = Listing::where('featured',1)->get();
            $resouce = FarmListResource::collection($listing);
        $test = new Category();
        $test->id = null;
        $test->title = 'Best Farms';
        $test->nep_title = 'Best Farms';
        $test->image = null;
        $test->farms = $resouce;


        $category = Category::has('rel_listing')->get();
        $category->push($test);
        $data = \App\Http\Resources\Category\CategoryResource::collection($category);
        return response()->json(['data'=>$data],200);
    }

    public function productCategory(){
        $category = ProductCategory::all();
        return response()->json(['data'=>ProductCategoryListResource::collection($category)],200);
    }
    public function getUnits(){
        $units = measureUnit();
        return response()->json(['data'=>$units],200);
    }
}
