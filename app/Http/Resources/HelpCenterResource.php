<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HelpCenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'         =>$this->id,
            'full_name'  =>$this->full_name,
            'phone'      =>$this->phone,
            'email'      =>$this->email,
            'subject'    =>$this->subject,
            'message'    =>$this->message,
            'status' =>$this->status,
            'created_at' =>$this->created_at->format('Y-m-d'),
        ];
    }
}
