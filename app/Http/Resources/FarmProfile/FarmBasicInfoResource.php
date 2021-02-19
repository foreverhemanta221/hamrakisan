<?php

namespace App\Http\Resources\FarmProfile;

use App\Http\Resources\Setting\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FarmBasicInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'about'=>$this->about,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'province'=>$this->address !=null ? check_province($this->address->province) : null,
            'district'=>$this->address !=null ? check_district($this->address->district) :null,
            'city'=>$this->address !=null ? $this->address->city :null,
            'landmark'=>$this->address !=null ? $this->address->landmark :null,
            'category'=>$this->categories !=null ?  !$this->categories->isEmpty() ? CategoryResource::collection($this->categories) :null : null
    ];
    }
}
