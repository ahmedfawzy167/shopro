<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $skus = $this->resource->items();

        return [
           'status' => 200,
           'data' => array_map(function ($sku) {
               return [
                   'id' => $sku->id,
                   'name' => $sku->name,
                   'product_id' => $sku->product->name,
                   'image' => $sku->image,
                   'created_at' => $sku->created_at,
                   'updated_at' => $sku->updated_at,
               ];
           }, $skus),
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
