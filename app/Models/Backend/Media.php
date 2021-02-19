<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'image',
        'title',
        'alt',
        'thumbnail'
    ];

    protected $appends = ['small_thumbnail_image','medium_thumbnail_image','original_image'];
    
    //Relations :
    
    public function galleries()
    {
        return $this->belongsToMany(ImageGallery::class);
    }

    public function sliders()
    {
        return $this->belongsTo(Slider::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function rel_image(){
        return $this->belongsTo('App\Models\Backend\Media','image_id');
    }

    //Appends 
    public function getSmallThumbnailImageAttribute(){
        if($this->rel_image != null){
            if(file_exists(public_path($this->rel_image->small_thumb))){
                return URL::asset($this->rel_image->small_thumb);
            }
        }
    }

    public function getMediumThumbnailImageAttribute(){
        if($this->rel_image != null){
            if(file_exists(public_path($this->rel_image->medium_thumb))){
                return URL::asset($this->rel_image->medium_thumb);
            }
        }
    }
    
    public function getOriginalImageAttribute(){
        if($this->rel_image != null){
            if(file_exists(public_path($this->rel_image->image))){
                return URL::asset($this->rel_image->image);
            }
        }
    }
   

}
