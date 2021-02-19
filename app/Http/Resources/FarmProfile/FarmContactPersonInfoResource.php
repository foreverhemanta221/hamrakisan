<?php

namespace App\Http\Resources\FarmProfile;

use Illuminate\Http\Resources\Json\JsonResource;

class FarmContactPersonInfoResource extends JsonResource
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
            'name'=>$this->contactPerson !=null ? $this->contactPerson->name :null,
            'post'=>$this->contactPerson !=null ? $this->contactPerson->post :null,
            'phone'=>$this->contactPerson !=null ? $this->contactPerson->phone :null,
            'email'=>$this->contactPerson !=null ? $this->contactPerson->email :null,
        ];
    }
}
