<?php

namespace App\Models\Backend;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
class Product extends Model
{
    protected  $table='products';

    public function categories()
    {
        return $this->belongsToMany(
            'App\Models\Backend\ProductCategory','product_category', 'product_id', 'category_id');
    }

    public function image_feature(){
        return $this->belongsTo('App\Models\Images','image_id','id');
    }
    public function images()
    {
        return $this->belongsToMany(
            'App\Models\Images', 'product_image', 'product_id', 'image_id');
    }

    public function rel_vendor(){
        return $this->belongsTo('App\Models\Vendor','vendor_id','id');
    }
    protected $appends= [
       'gallery_images','product_name','product_description','product_other_info','feature_image_small','feature_image_medium','vendor_name','vendor_contact','vendor_email'
    ];

    //search scope
    public function scopeSearch($query,$category,$search,$orderBy=null){
        return $query->whereHas('categories',function ($q)use($category){
            $q->where('slug',$category);
        })
            ->where('name','like','%'.$search.'%')
            ->orWhere('nep_name','like','%'.$search.'%')
            ->orWhere('description','like','%'.$search.'%')
            ->orderBy($orderBy,'desc');
    }

    public function getGalleryImagesAttribute(){
        $list = [];
        if($this->images !=null){
            if(count($this->images)>0){
                $i=0;
                foreach ($this->images as $image) {
                    $list[$i]= URL::asset($image->image);
                    $i++;
                }
            }
        }
        $list[0]= URL::asset($this->image_feature->image);
        return $list;
    }

    public function getShortDescription($stringcount){
        return substr($this->description,0,$stringcount);
    }

    public function getFeatureImage($size=null){
        if ($this->image_feature!=null){
            switch ($size){
                case 'small':
                    return URL::asset($this->image_feature->small_thumb);
                    break;
                case  'medium':
                    return URL::asset($this->image_feature->medium_thumb);
                    break;
                case 'banner':
                    return URL::asset($this->image_feature->banner);
                    break;
                default:
                    return URL::asset($this->image_feature->image);

            }
        }
    }

    public function getGalleryImage($size=null){
        $list = [];
        if(!$this->images->isEmpty()){
            switch ($size){
                case 'small':
                    $i=0;
                    foreach ($this->images as $image) {
                        $list[$i]= URL::asset($image->small_thumb);
                        $i++;
                    }
                    return $list;
                    break;
                case 'medium':
                    $i=0;
                    foreach ($this->images as $image) {
                        $list[$i]= URL::asset($image->medium_thumb);
                        $i++;
                    }
                    return $list;
                    break;

                case 'banner':
                    $i=0;
                    foreach ($this->images as $image) {
                        $list[$i]= URL::asset($image->banner);
                        $i++;
                    }
                    return $list;
                    break;
                default:
                    $i=0;
                    foreach ($this->images as $image) {
                        $list[$i]= URL::asset($image->image);
                        $i++;
                    }
                    return $list;
                    break;

            }
        }
        $list[0]=$this->getFeatureImage($size);
        return $list;
    }



    //vendor data
    public function getVendorNameAttribute(){
        if($this->rel_vendor !=null){
            return $this->rel_vendor->name;
        }
    }
    public function getVendorContactAttribute(){
        if($this->rel_vendor !=null){
            return $this->rel_vendor->cp_phone;
        }
    }
    public function getVendorEmailAttribute(){
        if ($this->rel_vendor!=null){
            return $this->rel_vendor->email;
        }
    }



    // for translation
    public function getProductNameAttribute(){
        if(Session::has('locale')){
            if(Session::get('locale')=='ne'){

                if($this->nep_name != null) {
                    return $this->nep_name;
                }else{
                   return $this->name;
                }
            }else{
                return $this->name;
            }
        }else{
            return $this->name;
        }
    }
    public function getProductDescriptionAttribute(){
        if(Session::has('locale')){
            if(Session::get('locale')=='ne'){
                if(isset($this->nep_name)) {
                    return $this->nep_description;
                }  return $this->description;
            }else{
                return $this->description;
            }
        }else{
            return $this->description;
        }
    }
    public function getProductOtherInfoAttribute(){
        if(Session::has('locale')){
            if(Session::get('locale')=='ne'){
                if(isset($this->nep_other_info)) {
                    return $this->nep_other_info;
                }  return $this->other_info;
            }else{
                return $this->other_info;
            }
        }else{
            return $this->other_info;
        }
    }
    public function getFeatureImageMediumAttribute(){

        if($this->image_feature!=null){
            return URL::asset($this->image_feature->medium_thumb);
        }
        return URL::asset('frontend/images/hamra-kisan.png');
    }
    public function getFeatureImageSmallAttribute(){
        if($this->image_feature!=null){

            return URL::asset($this->image_feature->small_thumb);
        }

        return URL::asset('frontend/images/hamra-kisan.png');
    }
}
