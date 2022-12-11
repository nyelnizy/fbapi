<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class JoinReason
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property string $reason
 */
class JoinReason extends Model
{


    public $table = 'join_reasons';




    public $fillable = [
        'reason'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'reason' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'reason' => 'required'
        ];
    }
}
