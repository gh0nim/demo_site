<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'Order ID' => $this->order_id,
            'Order Image' => $this->order_image,
            'Order Name' => $this->order_name,
            'Order Price' => $this->order_price,
            'Ordered By' => $this->bill_forms->first_name,
            
           
        ];
    }
}
