<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Customization
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $company_id
 * @property string $first_name
 * @property string $details
 */
class Customization extends Model
{


    public $table = 'customizations';




    public $fillable = [
        'company_id',
        'first_name',
        'details'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'company_id' => 'integer',
        'first_name' => 'string',
        'details' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'company_id' => 'required',
            'first_name' => 'required',
            'details' => 'required'
        ];
    }
}
