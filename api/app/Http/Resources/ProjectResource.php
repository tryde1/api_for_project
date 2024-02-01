<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'logo' => $this->getFirstMediaUrl('main'),
            'description' => $this->description,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'services' => $this->services,
            'subservices' => $this->subservices,
            'photos' => $this->photos->map(function ($photos) {
                return $photos->getFirstMediaUrl('main');
            }),
            'data' => $this->data,
            'video' => $this->video,
            'video_preview' => $this->getFirstMediaUrl('images'),
        ];
    }
}
