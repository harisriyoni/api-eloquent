<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public static $wrap = "data";
    public function toArray(Request $request): array
    {
        return [
            "data" => ProductResource::collection($this->collection),
        ];
    }
    public function withResponse(Request $request, JsonResponse $response)
    {
        $response->header("X-Powered-By", "Haris Riyoni");
    }
}
