<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $subcategories = $this->resource->items();

        return [
           'status' => 200,
           'data' => array_map(function ($subcategory) {
               return [
                   'id' => $subcategory->id,
                   'name' => $subcategory->name,
                   'image' => $subcategory->image,
                   'category_id' => $subcategory->category->name,
                   'created_at' => $subcategory->created_at,
                   'updated_at' => $subcategory->updated_at,
               ];
           }, $subcategories),
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
