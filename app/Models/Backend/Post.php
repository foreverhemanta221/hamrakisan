<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Post extends Model
{

    protected $fillable = [
        'author_id', 'category_id', 'title', 'body', 'slug', 'meta_desc', 'meta_keywords', 'status', 'featured'
    ];

  protected $appends= ['small_thumbnail_image','medium_thumbnail_image','original_image'];
    

    //Required Relations:
    public function rel_category(){
        return $this->belongsTo('App\Models\Backend\Category','category_id');
    }

    public function rel_image(){
        return $this->belongsTo('App\Models\Backend\Media','image_id','id');
    }

    public function file(){
        return $this->belongsTo('App\Models\Backend\File','file_id');
    }

//Required Append Attribute Functions:

    public function getSmallThumbnailImageAttribute(){
        if($this->rel_image() != null){
            if(file_exists($this->rel_image->small_thumb)){
                return URL::asset($this->rel_image->small_thumb);
            }
        }
    }
    public function getMediumThumbnailImageAttribute(){

        if($this->rel_image() != null){
            if(file_exists($this->rel_image->medium_thumb)){
                return URL::asset($this->rel_image->medium_thumb);
            }
        }
    }
    public function getOriginalImageAttribute(){
        if($this->rel_image() != null){
            if(file_exists($this->rel_image->image)){
                return URL::asset($this->rel_image->image);
            }
        }
    }

}
