<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Numbering
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $company_id
 * @property string $type
 * @property string $prefix
 * @property integer $length
 */
class Numbering extends Model
{


    public $table = 'numberings';




    public $fillable = [
        'company_id',
        'type',
        'prefix',
        'length'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'type' => 'string',
        'prefix' => 'string',
        'length' => 'integer'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'company_id' => 'required',
            'type' => 'required',
            'prefix' => 'nullable',
            'length' => 'required'
        ];
    }
}
