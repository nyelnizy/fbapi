<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class MembershipSize
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $min
 * @property integer $max
 */
class MembershipSize extends Model
{


    public $table = 'membership_sizes';




    public $fillable = [
        'min',
        'max'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'min' => 'integer',
        'max' => 'integer'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'min' => 'required|integer',
            'max' => 'required|integer'
        ];
    }
}
