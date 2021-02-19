<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillables = [
        'title',
        'url'
    ];

    public function menu()
    {
        return $this->belongsTo('App\Models\Backend\Menu', 'menu_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Backend\MenuItem', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Backend\MenuItem', 'parent_id');
    }


}
