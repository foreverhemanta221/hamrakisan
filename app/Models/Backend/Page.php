<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Page extends Model
{
    protected $appends= ['small_thumbnail_image','medium_thumbnail_image','original_image'];
    //relations
    public function image(){
        return $this->belongsTo('App\Models\Backend\Media','image_id');
    }
    //apends
    public function getSmallThumbnailImageAttribute(){
        if($this->image != null){
            if(file_exists(public_path($this->image->small_thumb))){
                return URL::asset($this->image->small_thumb);
            }
        }
    }

    public function getMediumThumbnailImageAttribute(){
        if($this->image != null){
            if(file_exists(public_path($this->image->medium_thumb))){
                return URL::asset($this->image->medium_thumb);
            }
        }
    }
    
    public function getOriginalImageAttribute(){
        if($this->image != null){
            if(file_exists(public_path($this->image->image))){
                return URL::asset($this->image->image);
            }
        }
    }

}
