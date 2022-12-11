<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Currency
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property string $name
 * @property string $symbol
 * @property string $abbreviation
 */
class Currency extends Model
{


    public $table = 'currencies';




    public $fillable = [
        'name',
        'symbol',
        'abbreviation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'symbol' => 'string',
        'abbreviation' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'name' => 'required',
            'symbol' => 'required',
            'abbreviation' => 'required'
        ];
    }
}
