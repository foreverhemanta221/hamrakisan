<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class FarmStory extends Model
{
    protected $appends=['feature_image'];
    public function image_feature(){
        return $this->belongsTo('App\Models\Images','image_id','id');
    }
    public function getFeatureImageAttribute(){
        $featured_image = $this->image_feature;
        if($this->image_feature!=null){
            $image = $this->image_feature->medium_thumb;
            if(file_exists($image)){
                return URL::asset($image);
            }
        }
        return  URL::asset('frontend/images/hamra-kisan.png');
    }
}
