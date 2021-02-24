<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $appends=['category_image'];
    protected $fillable=['title','nep_title','slug','description','image_id','featured','seo_title','meta_description','meta_keywords'];
    public function image(){
        return $this->hasOne('App\Models\Images','id','image_id');
    }

    public function getCategoryImageAttribute(){
        if($this->image !=null){
            $image = $this->image->small_thumb;
            return $image;
        }
        return null;
    }

    public function rel_listing(){
        return $this->belongsToMany('App\Models\Listing','listing_category','listing_id','category_id');
    }

    /**
     * Get all of the listings for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class, 'category_id', 'id');
    }
}
