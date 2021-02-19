<?php

namespace App\Models;

use App\Models\Backend\Product;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{

    protected $fillable=[
        'name',
        'email',
        'address',
        'cp_name',
        'cp_phone',
        'description'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
