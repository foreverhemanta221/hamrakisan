<?php

namespace App\Http\Resources\Farm;
use App\Http\Resources\Farm\FarmProduct\FarmProductResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class FarmDetailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'category'=>$this->rel_category->title,
            'slug'=>$this->slug,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'detail'=> strip_tags(trim($this->farm_detail)),
            'feature_image'=>URL::asset($this->getFeatureImage('medium')),
            'image_gallery'=>$this->image_gallery,
            'location'=>[
                'address'=>$this->short_address,
                'full_address'=>$this->long_address,
                'province'=>$this->address()!=null ?  $this->address()->first()->province :'',
                'district'=>$this->address()!=null ?  $this->address()->first()->district :'',
                'city'=>$this->address()!=null ?  $this->address()->first()->city :'',
            ],
            'geolocation'=>[
                'latitute'=>$this->getLatitude(),
                'longtitude'=>$this->getLongtitude(),
            ],
            'social'=>[
                'website'=>$this->website,
                'facebook'=>$this->facebook,
                'youtube'=>$this->youtube,
            ],
            'products'=> FarmProductResource::collection($this->products),
        ];
    }
}
