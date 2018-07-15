<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PointResource extends JsonResource
{
    public function toArray($request)
    {
      return [
        'receiver_id' => $this->Receiver->id,
        'name' => $this->Receiver->name,
        'description' => $this->description,
        'latitude' => $this->latitude,
        'longitude' => $this->longitude,
        'areas' => $this->Areas()->pluck('name'),
      ];
        return parent::toArray($request);
    }
}
