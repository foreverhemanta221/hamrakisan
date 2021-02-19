<?php

namespace App\Models\WebSetting;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected  $appends=[
        'image'
    ];
    public function rel_image(){
        return $this->belongsTo('App\Models\Images','image_id');
    }

    public function getImageAttribute(){
        if($this->rel_image!=null) return $this->rel_image->image;
    }
}
