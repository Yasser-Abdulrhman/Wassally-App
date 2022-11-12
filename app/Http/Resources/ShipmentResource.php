<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;


class ShipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'shipment_number' => $this->shipment_number,
            'no_pieces' => $this->no_pieces,
            'weight' => $this->weight,
            'description' => $this->description,
            'status' => $this->status,
            'created_by' => new UserResource($this->created_by),
            'sender' => new UserResource($this->sender),
            'reciever' => new UserResource($this->reciever),
            'specific_address' => $this->specific_address,
        ];
    }
}
