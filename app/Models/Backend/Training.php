<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Training extends Model
{
    protected $fillable=['training_name','short_description','description','price','feature_video','feature_image','training_features','training_tags','is_featured','is_active'];
    public function rel_image(){
        return $this->hasOne('App\Models\Images','id','feature_image');
    }
    public function rel_instructor()
    {
        return $this->belongsToMany('App\Models\Backend\Instructor', 'training_instructor', 'training_id', 'instructor_id');
    }
    public function rel_faq(){
        return $this->hasMany('App\Models\Backend\TrainingFaq','training_id','id');
    }
    public function rel_syllabus(){
        return $this->hasMany('App\Models\Backend\TrainingSyllabus','training_id','id');
    }

    public function getFeatureImage($size=null){
        if($this->rel_image!=null){
            switch ($size){
                case 'small':
                    return URL::asset($this->rel_image->small_thumb);
                    break;
                case  'medium':
                    return URL::asset($this->rel_image->medium_thumb);
                    break;
                case 'banner':
                    return URL::asset($this->rel_image->banner);
                    break;
                default:
                    return URL::asset($this->rel_image->image);
            }
        }
    }
}
