<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Beneficiary
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $member_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 */
class Beneficiary extends Model
{


    public $table = 'beneficiaries';




    public $fillable = [
        'member_id',
        'first_name',
        'middle_name',
        'last_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'member_id' => 'integer',
        'first_name' => 'string',
        'middle_name' => 'string',
        'last_name' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'member_id' => 'required',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required'
        ];
    }
}
