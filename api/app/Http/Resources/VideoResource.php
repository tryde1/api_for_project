<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'url' => $this->url,
            'video' => public_path("app/public/".$this->video),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'preview' => $this->getFirstMediaUrl('images'),
        ];
    }
}
