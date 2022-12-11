<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class City
 * @package App\Models
 * @version December 4, 2022, 12:52 pm UTC
 *
 * @property integer $region_id
 * @property string $name
 */
class City extends Model
{


    public $table = 'cities';




    public $fillable = [
        'region_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'region_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'region_id' => 'required',
            'name' => 'required|unique:cities,name'
        ];
    }
}
