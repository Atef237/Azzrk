<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'  => $this->name,
            'price' => $this->price,
            'status_in_stock' => $this->quantity > 0 ? 'In Stock' : 'Out of Stock',
            'colors' => ColorsProductResource::collection($this->whenLoaded('colors') ),
            'sizes'  => ProductSizesResource::collection($this->whenLoaded('sizes') ),
        ];
    }
}
