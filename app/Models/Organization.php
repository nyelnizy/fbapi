<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Organization
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property string $organization_id
 * @property integer $registered_by
 * @property integer $membership_size_id
 * @property string $name
 * @property string $biography
 * @property string $date_established
 * @property string $date_joined
 * @property integer $join_reason_id
 * @property string $logo
 */
class Organization extends Model
{


    public $table = 'organizations';




    public $fillable = [
        'organization_id',
        'registered_by',
        'membership_size_id',
        'name',
        'biography',
        'date_established',
        'date_joined',
        'join_reason_id',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'organization_id' => 'string',
        'registered_by' => 'integer',
        'membership_size_id' => 'integer',
        'name' => 'string',
        'biography' => 'string',
        'join_reason_id' => 'integer',
        'logo' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'organization_id' => 'required',
            'registered_by' => 'required',
            'membership_size_id' => 'required',
            'name' => 'required|unique:organizations,name',
            'biography' => 'nullable',
            'date_established' => 'required|date',
            'date_joined' => 'required|date',
            'join_reason_id' => 'required',
            'logo' => 'nullable|file|mimes:jpg,png,jpeg'
        ];
    }
}
