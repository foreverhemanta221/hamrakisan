<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AdManager extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'image',
        'category',
        'width',
        'height',
        'company_name',
        'start_date',
        'expiry_date',
        'status'
    ];

}
