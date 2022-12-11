<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Classification
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property string $title
 */
class Classification extends Model
{


    public $table = 'classifications';




    public $fillable = [
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'title' => 'required'
        ];
    }
}
