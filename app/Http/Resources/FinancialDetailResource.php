<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FinancialDetailResource extends JsonResource
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
            'bank_account_number' => $this->bank_account_number,
            'branch_name' => $this->branch_name,
            'bank_account_name' => $this->bank_account_name,
            'momo_number' => $this->momo_number,
            'momo_account_type' => $this->momo_account_type,
            'momo_account_name' => $this->momo_account_name,
            'owner' => $this->owner,
            'owner_type' => $this->owner_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
