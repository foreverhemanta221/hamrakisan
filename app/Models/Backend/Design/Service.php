<?php

namespace App\Models\Backend\Design;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $appends= ['feature_image'];
    public function image(){
        return $this->belongsTo('App\Models\Backend\Media','image_id');
    }
    
    public function getFeatureImageAttribute(){
     
        if($this->image !=null){
            return URL::to('back-end/uploads/thumbnail/'.$this->image->path);
        }
    }
}
