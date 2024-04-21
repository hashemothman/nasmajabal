<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'guest_number' => $this->guest_number,
            'description' => $this->description,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'order_date' => $this->created_at->format('Y-m-d'),
            'room_type' =>  $this->type()->pluck('name'),
            'date_of_create' =>$this->created_at->format('Y-m-d'),
            ];
    }
}
