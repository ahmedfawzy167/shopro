<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'status' => 200,
            'data' => [
                'id' => $this->id,
                'user_id' => $this->user->name,
                'sku_id' => $this->sku->name,
                'quantity' => $this->quantity,
                'sku_image' => $this->sku->image,
                'sku_product_price' => $this->sku->product->price,
                'sku_product_stock' => $this->sku->product->stock,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
