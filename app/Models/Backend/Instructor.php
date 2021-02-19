<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Instructor extends Model
{
    protected $fillable=[
      'instructor_name','instructor_detail','instructor_profession','instructor_image','instructor_social_site_detail'
    ];
    public function rel_image(){
        return $this->hasOne('App\Models\Images','id','instructor_image');
    }

    public function getInstructorImage($size=null){
        if($this->rel_image!=null){
            switch ($size){
                case 'small':
                    return URL::asset($this->rel_image->small_thumb);
                    break;
                case  'medium':
                    return URL::asset($this->rel_image->medium_thumb);
                    break;
                case 'banner':
                    return URL::asset($this->rel_image->banner);
                    break;
                default:
                    return URL::asset($this->rel_image->image);
            }
        }
    }
    public function getSocialMediaDetai($media){
        if($this->instructor_social_site_detail!=null){
            $socialDetail = json_decode($this->instructor_social_site_detail);
            switch ($media){
                case "twitter":
                    return property_exists($socialDetail,'twitter') ?  $socialDetail->twitter : "#";
                    break;
                case "facebook" :
                    return  property_exists($socialDetail,'facebook') ? $socialDetail->facebook: "#";
                    break;
                case "instagram":
                    return property_exists($socialDetail,'instagram') ? $socialDetail->instagram : "#" ;
                    break;
                default:
                    return "#";
            }
        }
    }
}
