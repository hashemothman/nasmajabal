<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ImageResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id ,
            'title'            => $this->title,
            'summary'          => $this->summary,
            'description'      => $this->description,
            'images'           =>  ImageResource::collection($this->images),
            'videos'           => $this->videos->pluck('video'),
            'created_at'       => $this->created_at->format('Y-m-d'),
            'language'         => $this->langauges->name,
            'category'         => $this->category->name,
        ];
    }
}
