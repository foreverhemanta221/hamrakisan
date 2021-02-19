<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $table = 'pageseos';

    public function pages(){
        return $this->belongsTo('App\Models\Backend\Page','page_id'); 
    }
}
