<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Item extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "data" => [
                'id' => $this->id,
                'name' => $this->name,
                'completed' => $this->completed,
                'completed_at' => $this->completed_at,
            ],
            'status' => "success",
        ];
    }
}
