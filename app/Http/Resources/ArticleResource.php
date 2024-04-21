<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Resources\ImageResource;
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
            'id'         => $this->id,
            'title'      => $this->title,
            'summary'    => $this->summary,
            'description'=> $this->description,
            'language'   => $this->langauges->name,
            'created_at' => $this->created_at->format('Y-m-d'),
            'images'     => ImageResource::collection($this->images),
            'videos'     => $this->videos->pluck('video'),
            'category'       => $this->category->pluck('name'),
            'tags'       => $this->tags->pluck('name'),
        ];
    }
}
