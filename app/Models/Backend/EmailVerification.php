<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class EmailVerification extends Model
{
    public function rel_user(){
        return $this->belongsTo('App\Models\Backend\User','user_id');
    }
}
