<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashBoardResource extends JsonResource
{
  
    public function toArray($request): array
    {
        return [
            'ID of the product' => $this->product_id,
            'Price of the product' => $this->product_price,
            'Name of the product' => $this->product_name,
            'Image of the product' => $this->product_image,
            'Production date' => $this->created_at

        ];
    }
}
