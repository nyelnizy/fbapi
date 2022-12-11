<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class District
 * @package App\Models
 * @version December 4, 2022, 12:52 pm UTC
 *
 * @property integer $city_id
 * @property string $name
 */
class District extends Model
{


    public $table = 'districts';




    public $fillable = [
        'city_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'city_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'city_id' => 'required',
            'name' => 'required|unique:districts,name'
        ];
    }
}
