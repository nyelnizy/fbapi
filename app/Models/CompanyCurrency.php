<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class CompanyCurrency
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $company_id
 * @property integer $current_currency
 * @property integer $conversion_currency
 * @property number $current_rate
 */
class CompanyCurrency extends Model
{


    public $table = 'company_currencies';




    public $fillable = [
        'company_id',
        'current_currency',
        'conversion_currency',
        'current_rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'current_currency' => 'integer',
        'conversion_currency' => 'integer',
        'current_rate' => 'double'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'company_id' => 'required',
            'current_currency' => 'required',
            'conversion_currency' => 'required',
            'current_rate' => 'nullable'
        ];
    }
}
