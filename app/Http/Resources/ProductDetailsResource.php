<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
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
                'name' => $this->name,
                'description' => $this->description,
                'cost' => $this->cost,
                'price' => $this->price,
                'stock' => $this->stock,
                'subcategory_id' => $this->subcategory->name,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
    }
}
