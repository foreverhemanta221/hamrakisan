<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillables = ['name'];

    public function items()
    {
        return $this->hasMany('App\Models\Backend\MenuItem', 'menu_id');
    }


}
