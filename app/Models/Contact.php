<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Contact
 * @package App\Models
 * @version December 4, 2022, 12:52 pm UTC
 *
 * @property integer $owner
 * @property string $owner_type
 * @property string $phone
 * @property string $secondary_phone
 * @property string $email
 * @property string $website
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $box_number
 */
class Contact extends Model
{


    public $table = 'contacts';




    public $fillable = [
        'owner',
        'owner_type',
        'phone',
        'secondary_phone',
        'email',
        'website',
        'facebook',
        'twitter',
        'linkedin',
        'box_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner' => 'integer',
        'owner_type' => 'string',
        'phone' => 'string',
        'secondary_phone' => 'string',
        'email' => 'string',
        'website' => 'string',
        'facebook' => 'string',
        'twitter' => 'string',
        'linkedin' => 'string',
        'box_number' => 'string'
    ];

    /**
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'owner' => 'required',
            'owner_type' => 'required',
            'phone' => 'required|min:6|max:20|unique:contacts,phone',
            'secondary_phone' => 'nullable|min:6|max:20|unique:contacts,secondary_phone',
            'email' => 'nullable|email|unique:contacts,email',
            'website' => 'nullable|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'box_number' => 'nullable'
        ];
    }
}
