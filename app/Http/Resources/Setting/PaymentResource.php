<?php

namespace App\Http\Resources\Setting;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
                ['payment_name'=> 'cash on delivery',
                'image'=> URL::to('frontend/img/icons/cashon.png'),
                'status'=> true],
                [
                        'payment_name'=> 'Esewa',
                        'image'=> URL::to('frontend/img/trainings/esewa.png'),
                        'status'=> false
                ]
        ];
    }
}
