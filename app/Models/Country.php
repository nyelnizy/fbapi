<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Country
 * @package App\Models
 * @version December 4, 2022, 12:52 pm UTC
 *
 * @property string $name
 */
class Country extends Model
{


    public $table = 'countries';




    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'name' => 'required|unique:countries,name'
        ];
    }
}
