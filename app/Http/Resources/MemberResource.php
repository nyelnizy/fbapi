<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'registered_by' => $this->registered_by,
            'organization_id' => $this->organization_id,
            'member_id' => $this->member_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'occupation' => $this->occupation,
            'educational_level' => $this->educational_level,
            'date_joined' => $this->date_joined,
            'photo' => $this->photo,
            'marital_status' => $this->marital_status,
            'number_of_dependencies' => $this->number_of_dependencies,
            'password' => $this->password,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
