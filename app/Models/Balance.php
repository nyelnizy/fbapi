<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Balance
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $sms
 * @property integer $email
 */
class Balance extends Model
{


    public $table = 'balances';




    public $fillable = [
        'sms',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sms' => 'integer',
        'email' => 'integer'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'sms' => 'required',
            'email' => 'required'
        ];
    }
}
