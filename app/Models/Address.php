<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Address
 * @package App\Models
 * @version December 4, 2022, 12:52 pm UTC
 *
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $district_id
 * @property string $town
 * @property string $community
 * @property string $street
 * @property string $house_number
 * @property string $postal_code
 * @property boolean $is_primary
 * @property integer $owner
 * @property string $owner_type
 */
class Address extends Model
{


    public $table = 'addresses';




    public $fillable = [
        'country_id',
        'region_id',
        'city_id',
        'district_id',
        'town',
        'community',
        'street',
        'house_number',
        'postal_code',
        'is_primary',
        'owner',
        'owner_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'region_id' => 'integer',
        'city_id' => 'integer',
        'district_id' => 'integer',
        'town' => 'string',
        'community' => 'string',
        'street' => 'string',
        'house_number' => 'string',
        'postal_code' => 'string',
        'is_primary' => 'boolean',
        'owner' => 'integer',
        'owner_type' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'country_id' => 'required',
            'region_id' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'town' => 'nullable',
            'community' => 'nullable',
            'street' => 'nullable',
            'house_number' => 'nullable',
            'postal_code' => 'nullable',
            'is_primary' => 'nullable',
            'owner' => 'required',
            'owner_type' => 'required'
        ];
    }
}
