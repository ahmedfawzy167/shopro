<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $reviews = $this->resource->items();

        return [
           'status' => 200,
           'data' => array_map(function ($review) {
               return [
                   'id' => $review->id,
                   'product_id' => $review->product->name,
                   'user_id' => $review->user->name,
                   'content' => $review->content,
                   'rating' => $review->rating,
                   'created_at' => $review->created_at,
                   'updated_at' => $review->updated_at,
               ];
           }, $reviews),
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
