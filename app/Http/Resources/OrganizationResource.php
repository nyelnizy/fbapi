<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'organization_id' => $this->organization_id,
            'registered_by' => $this->registered_by,
            'membership_size_id' => $this->membership_size_id,
            'organization_id' => $this->organization_id,
            'name' => $this->name,
            'biography' => $this->biography,
            'date_established' => $this->date_established,
            'date_joined' => $this->date_joined,
            'join_reason_id' => $this->join_reason_id,
            'logo' => $this->logo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
