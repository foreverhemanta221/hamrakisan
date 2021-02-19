<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['nep_name','nep_description'];
    public function products()
    {
        return $this->belongsToMany(
            'App\Models\Backend\Product','product_category', 'category_id', 'product_id');
    }
}
