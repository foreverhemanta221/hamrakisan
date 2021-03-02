<?php

namespace App\Models;

use App\Models\Backend\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'user_id',
        'name',
        'category_id',
        'slug',
        'about',
        'services',
        'logo_image',
        'feature_image',
        'color',
        'featured',
        'status',
        'phone',
        'mobile',
        'address_id',
        'email',
        'website',
        'facebook',
        'twitter',
        'instagram',
        'youtube'
        ];

    protected $appends= [
        'short_address',
        'image_gallery',
        'product_list'
    ];
    //    relations
    public function address()
    {
        return $this->belongsTo('App\Models\Address','address_id','id');
    }

    public function rel_category()
    {
        return $this->belongsTo('App\Models\Category','category_id', 'id');
    }

    public function images()
    {
        return $this->belongsToMany('App\Models\Images', 'listing_image', 'listing_id', 'image_id');
    } 

    /**
     * Get the user that owns the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rel_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    //feature image
    public function image_feature(){
        return $this->belongsTo('App\Models\Images','feature_image','id');
    }

    public function products(){
        return $this->hasMany('App\Models\FarmProduct','farm_id','id');
    }
    public function minPriceSellsProduct(){
        if($this->products){
            return $this->products->where('price',$this->products->min('price'))->first();
        }
    }
    public function rel_products(){
        return $this->hasMany(FarmProduct::class);
    }
    public function rel_review(){
        return $this->hasMany('App\Models\Review','farm_id','id');
    }

    //search scope
    public function scopeSearch($query,$search,$orderBy=null){
        return $query->where('name','like','%'.$search.'%')
                    ->orWhere('nep_name','like','%'.$search.'%')
                    ->orWhere('about','like','%'.$search.'%')
                    ->orWhere('nep_about','like','%'.$search.'%')
                    ->orWhere('services','like','%'.$search.'%')
                    ->orWhere('nep_services','like','%'.$search.'%')
                    ->orWhere('status',1)
                    ->orderBy($orderBy,'desc');
    }
    //address serach
    public function scopeAddressSearch($query,$params){

        if($params['province']!=null && $params['district'] !=null){
            $query->whereHas('address',function ($q)use($params){
                $q->where('province',$params['province']);
                $q->where('district',$params['district']);
            });
        }else{
            $query->whereHas('address',function ($q)use($params){
                $q->where('province',$params['province']);
            });
        }
    }
//    //scope category
    public function scopeCategorySearch($query,$params){
        $query->where('category_id',$params['category']);
    }
    //relation ends here



    //for short address
    public function getShortAddressAttribute()
    {
        $shortAddrress = [
            $this->address()->first()->street,
            $this->address()->first()->city,
        ];
        return implode( ',', array_filter($shortAddrress));
    }
    public function getProvince(){
        return $this->address();
    }


    //product in array
    public function getProductListAttribute(){
        if($this->products!=null){
            $product_name = [];
            foreach ($this->products as $product){
                array_push($product_name,$product->name);
            }
            return $product_name;
        }
    }

    public function getLatitude(){
        if($this->address){
            return $this->address->latitude;
        }
    }

    public function getLongtitude(){
        if($this->address){
            return $this->address->longitude;
        }
    }

    function getImageGalleryAttribute(){
        if($this->images!=null){
            $images = [];
            $i=0;

            foreach ($this->images as $image){
                $images[$i] = URL::asset($image->image);
                $i++;
            }

            return $images;
        }
    }
    function getProductNumberAttribute(){
        if($this->products!=null){
            return $this->products->count()." Products";
        }
    }

    //other function
    public function getFeatureImage($size=null){
        // dd($this->images->count());
        // dd($this->image_feature!==null);
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
        }elseif($this->images->count() > 0){
            switch ($size){
                case 'small':
                    return URL::asset($this->images->first()->small_thumb);
                    break;
                case  'medium':
                    return URL::asset($this->images->first()->medium_thumb);
                    break;
                case 'banner':
                    return URL::asset($this->images->first()->banner);
                    break;
                default:
                    return URL::asset($this->images->first()->image);

            }
        }
        return URL::asset('frontend/img/logo.png');
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
        return $list;
    }

    public function getCaegory(){
        if($this->rel_category!=null){
            return $this->rel_category->title;
        }
    }
    public function scopeOnlyApproved($query)
    {
        return $query->where('status',1);
    }


    public function newOrders(){
        
    }

     public function getFarmNameAvearageReview(){
            if($this->rel_review){
                return  (int) round($this->rel_review->where('status',1)->avg('star'));
            }
    }

}
