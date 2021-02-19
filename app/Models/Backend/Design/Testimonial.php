<?php

namespace App\Models\Backend\Design;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
   public function image(){
        return $this->belongsTo('App\Models\Backend\Media','image_id');
    }
}
