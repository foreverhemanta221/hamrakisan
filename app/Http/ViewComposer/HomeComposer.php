<?php

namespace App\Http\ViewComposer;
use App\Models\Backend\Product;
use App\Models\Backend\Training;
use App\Models\Category;
use App\Models\FarmStory;
use App\Models\Listing;
use App\Models\WebSetting\Banner;
use Illuminate\View\View;

class HomeComposer
{
    public function getBanner(View $view){
        $banner = Banner::all();
        if($banner->count()>0){
            return $view->with('allbanner',$banner);
        }
        return $view->with('allbanner',null);
    }

    public function getCategory(View $view){
        $category = Category::all();
        if($category->count()>0){
            return $view->with('allcategory',$category);
        }
        return $view->with('allcategory',null);
    }

    public function getFeatureProduct(View $view){
        $product = Product::all();
        return $view->with('featureproduct',$product);
    }
    public function getFeatureVideo(View $view){
        $farmstories = FarmStory::all();
        return $view->with('featureVideo',$farmstories);
    }

    public function getFeatureListing(View $view){
        $listing = Listing::with('address')->where('featured',1)->where('status',1)->take(12)->get();
        return $view->with('listings',$listing);
    }
    public function getTrainings(View $view){
        $trainings = Training::all();
        return $view->with('alltraining',$trainings);
    }
}
