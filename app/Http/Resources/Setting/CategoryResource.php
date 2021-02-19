<?php

namespace App\Http\Resources\Setting;

use App\Http\Resources\Farm\FarmListResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class CategoryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'nep_title'=>$this->nep_title,
        ];
    }
}
