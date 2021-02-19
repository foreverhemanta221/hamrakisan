<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id','farm_id','star','description','status'];

    public function rel_user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function rel_listing(){
        return $this->hasOne('App\Models\Listing','id','farm_id');
    }

    public function scopeSearch($query, $searchTerm) {

        return $query
            ->whereHas('rel_user',function ($q) use($searchTerm){
                $q->where('name','like','%'.$searchTerm."%")
                    ->orWhere('email','like','%'.$searchTerm."%");
            })
            ->orWhere('description', 'like', "%" . $searchTerm . "%")
            ->orWhere('star', 'like', "%" . $searchTerm . "%");
    }

}
