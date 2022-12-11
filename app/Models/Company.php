<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Company
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $classification_id
 * @property string $name
 * @property string $vat
 * @property string $registration_number
 * @property string $logo
 */
class Company extends Model
{


    public $table = 'companies';




    public $fillable = [
        'classification_id',
        'name',
        'vat',
        'registration_number',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'classification_id' => 'integer',
        'name' => 'string',
        'vat' => 'string',
        'registration_number' => 'string',
        'logo' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'classification_id' => 'required',
            'name' => 'required|unique:companies,name',
            'vat' => 'required|unique:companies,vat',
            'registration_number' => 'required|unique:companies,registration_number',
            'logo' => 'nullable'
        ];
    }
}
