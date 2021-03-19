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
        'specific_address',
        'district',
        'latitude',
        'longitude'
    ];
    public function listings()
    {
        return $this->hasOne('App\Models\Listing','id','address_id');
    }
}
