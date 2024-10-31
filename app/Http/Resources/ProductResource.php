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
    public static $wrap = "values";

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => new CategorysimpleResource($this->whenLoaded("category")),
            'price' => $this->price,
            'is_expensive' => $this->when($this->price > 1000, true, false),
            'di buat' => $this->created_at,
            'di update' => $this->updated_at,

        ];
    }
}
