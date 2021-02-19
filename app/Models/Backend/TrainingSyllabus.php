<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class TrainingSyllabus extends Model
{
    protected $fillable =[
        'training_id','training_syllabus_title','training_syllabus_detail','training_syllabus_duration'
    ];

}
