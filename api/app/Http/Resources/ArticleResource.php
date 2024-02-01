<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tags' => $this->tags,
            'services' => $this->services,
            'photos' => $this->photos->map(function ($photos) {
                return $photos->getFirstMediaUrl('main');
            }),
            'preview' => $this->getFirstMediaUrl('images'),
            'url' => $this->url
        ];
    }
}
