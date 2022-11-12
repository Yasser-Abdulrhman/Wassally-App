<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\AreaResource;
use App\Http\Resources\ShipmentResource;


class UserResource extends JsonResource
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
            'email' => $this->email,
            'phone' => $this->phone,
            'identity_card' => $this->identity_card,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'area' => new AreaResource($this->area),
            'roles' => RoleResource::collection($this->roles),
            'user_permissions' => PermissionResource::collection($this->permissions),
            'shipments_sent' => ShipmentResource::collection($this->sentShipments),
            'shipments_recieved' => ShipmentResource::collection($this->recievedShipments),
        ];
    }
}
