<?php

namespace App\Models\Backend;


use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    protected $fillable = ['title'];

    public function images()
    {
        return $this->belongsToMany(Media::class);
    }

}
