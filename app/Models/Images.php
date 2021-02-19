<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table='images';
    protected $fillable=[
        'image',
        'medium_thumb',
        'small_thumb',
        'user_id'
    ];
}
