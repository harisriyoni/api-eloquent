<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductdebugResource extends JsonResource
{
    /**
     * @mixin Product
     */
    // public $additional = [
    //     'success' => true,
    //     'author' => 'Haris Riyoni',
    // ];
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "author" => "Haris Riyoni",
            "server_time" => now()->toDateTimeString(),
            "data" => [
                "id" => $this->id,
                "name" => $this->name,
                "price" => $this->price,
            ]];
    }
}
