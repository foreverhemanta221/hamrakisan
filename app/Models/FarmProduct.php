<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;

class FarmProduct extends Model
{
    use SoftDeletes;
    protected $fillable=[
      'name','farm_id','minimum_quantity','measure_unit','price','image_id','is_available'
    ];

    protected $dates=['deleted_at'];
    public function listing(){
        return $this->hasOne('App\Models\Listing','id','farm_id');
    }
    public function booking(){
        return $this->hasMany('App\Models\FarmProductBook','product_id','id');
    }
    public function rel_image(){
        return $this->belongsTo('App\Models\Images','image_id','id');
    }
    public function getFarmNameAvearageReview(){
        if($this->listing){
            if($this->listing->rel_review){
                return $this->listing->rel_review->where('status',1)->avg('star');
            }
        }
    }
    public function getFarmName(){
        if($this->listing!=null){
            return $this->listing->name;
        }
    }
    public function getFarmSlug(){
        if($this->listing!=null){
            return $this->listing->slug;
        }
    }
    public function getFeatureImage($size=null){
        if ($this->rel_image!=null){
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
}
