<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class UserResource extends JsonResource
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
            'email'=>$this->email,
            'phone'=>$this->phone,
            'province'=>$this->province,
            'district'=>$this->district,
            'city'=>$this->city,
            'specificAddresss'=>$this->specific_address,
            'address'=>[
                    'province'=>[
                        'id'=>$this->province,
                        'value'=> check_province($this->province)
                    ],
                    'district'=>[
                        'id'=>$this->district,
                        'value'=>check_district($this->district)
                    ],
                    'city'=>$this->city,
                    'specificAddresss'=>$this->specific_address,
            ],
            'phone_no'=>$this->phone_no,
            'image'=>URL::asset($this->user_image),
            'role'=>$this->role,
            'joined_on'=>$this->created_at
        ];
    }
}
