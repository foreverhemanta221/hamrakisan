<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo('App\Models\Backend\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Backend\PackageCategory', 'parent_id');
    }
    public function rel_post(){
        return $this->hasMany('App\Models\Backend\Post','category_id');
    }
   
}
