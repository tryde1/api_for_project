<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'authorname' => $this->authorname,
            'text' => $this->text,
            'video' => public_path("app/public/".$this->video),
            'photo' => $this->getFirstMediaUrl('main'),
            'source' => $this->source,
            'source_url' => $this->source_url,
            'video_preview' => $this->getFirstMediaUrl('images'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
