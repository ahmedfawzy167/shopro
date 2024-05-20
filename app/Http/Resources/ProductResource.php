<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $products = $this->resource->items();

        return [
           'status' => 200,
           'data' => array_map(function ($product) {
               return [
                   'id' => $product->id,
                   'name' => $product->name,
                   'description' => $product->description,
                   'cost' => $product->cost,
                   'price' => $product->price,
                   'stock' => $product->stock,
                   'subcategory_id' => $product->subcategory->name,
                   'created_at' => $product->created_at,
                   'updated_at' => $product->updated_at,
               ];
           }, $products),
           'pagination' => [
               'total' => $this->resource->total(),
               'per_page' => $this->resource->perPage(),
               'current_page' => $this->resource->currentPage(),
               'last_page' => $this->resource->lastPage(),
               'next_page_url' => $this->resource->nextPageUrl(),
               'prev_page_url' => $this->resource->previousPageUrl(),
           ],
       ];

    }
}
