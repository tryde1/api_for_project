<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubserviceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->getFirstMediaUrl('main'),
            'offer' => $this->offer,
            'service_id' => $this->service_id,
            'url' => $this->url,
            'price' => $this->price,
            'compositions' => $this->compositions,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
