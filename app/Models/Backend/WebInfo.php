<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class WebInfo extends Model
{
  
    protected $appends= ['public_path_logo','website_logo','small_thumbnail_logo_image','medium_thumbnail_logo_image','original_logo_image'];
    //here the website_logo and original_logo image is same in case of presence of image on db. else may differ.

    public function images()
    {
        return $this->belongsToMany(Media::class);
    }

    public function image(){
        return $this->belongsTo('App\Models\Backend\Media','logo');
    }

    public function getWebSiteLogoAttribute(){
        
        if($this->image != null){
            return URL::asset($this->image->image);
        }else{
            return URL::asset('default_images/webroot_multipurpose.jpg');
        }
    }
    //this is actually for the website watermark purpose
    public function getPublicPathLogoAttribute(){
        
        if($this->image != null){
            return public_path($this->image->image);
        }else{
            return public_path('default_images/webroot_multipurpose.jpg');
        }
    }

    public function getSmallThumbnailLogoImageAttribute(){
        if($this->image != null){
            if(file_exists(public_path($this->image->small_thumb))){
                return URL::asset($this->image->small_thumb);
            }
        }
    }
    public function getMediumThumbnailLogoImageAttribute(){
        if($this->image != null){
            if(file_exists(public_path($this->image->medium_thumb))){
                return URL::asset($this->image->medium_thumb);
            }
        }
    }
    public function getOriginalLogoImageAttribute(){
        if($this->image != null){
            if(file_exists(public_path($this->image->image))){
                return URL::asset($this->image->image);
            }
        }
    }
    


}
