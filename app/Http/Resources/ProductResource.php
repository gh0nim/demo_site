<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'Client First Name' => $this->first_name,
            'Client Last Name' => $this->last_name,
            'Client Phone' => $this->phone,
            'Client E-mail' => $this->email,
            'Cupon Code' => $this->cupon_code,
            'Client Notes' => $this->order_notes,
        ];
    }
}
