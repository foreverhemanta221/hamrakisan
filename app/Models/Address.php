<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'landmark',
        'city',
        'province',
        'district'
    ];
    public function listings()
    {
        return $this->hasOne('App\Models\Listing','id','address_id');
    }
}
