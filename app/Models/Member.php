<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Member
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $registered_by
 * @property integer $organization_id
 * @property string $member_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $gender
 * @property string $dob
 * @property string $occupation
 * @property string $educational_level
 * @property string $date_joined
 * @property string $photo
 * @property string $marital_status
 * @property integer $number_of_dependencies
 * @property string $password
 * @property boolean $status
 */
class Member extends Model
{


    public $table = 'members';




    public $fillable = [
        'registered_by',
        'organization_id',
        'member_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'occupation',
        'educational_level',
        'date_joined',
        'photo',
        'marital_status',
        'number_of_dependencies',
        'password',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'registered_by' => 'integer',
        'organization_id' => 'integer',
        'member_id' => 'string',
        'first_name' => 'string',
        'middle_name' => 'string',
        'last_name' => 'string',
        'gender' => 'string',
        'dob' => 'date',
        'occupation' => 'string',
        'educational_level' => 'string',
        'photo' => 'string',
        'marital_status' => 'string',
        'number_of_dependencies' => 'integer',
        'password' => 'string',
        'status' => 'boolean'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'registered_by' => 'required',
            'organization_id' => 'required',
            'member_id' => 'required|unique:members,member_id',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'occupation' => 'required',
            'educational_level' => 'required',
            'date_joined' => 'required',
            'photo' => 'nullable|file|mimes:jpg,jpeg,png',
            'marital_status' => 'required',
            'number_of_dependencies' => 'required',
            'password' => 'required',
            'status' => 'required'
        ];
    }
}
