<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Region
 * @package App\Models
 * @version December 4, 2022, 12:52 pm UTC
 *
 * @property integer $country_id
 * @property string $name
 */
class Region extends Model
{


    public $table = 'regions';




    public $fillable = [
        'country_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'country_id' => 'required',
            'name' => 'required|unique:regions,name'
        ];
    }
}
