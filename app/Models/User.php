<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User
 * @package App\Models
 * @version December 4, 2022, 12:53 pm UTC
 *
 * @property integer $company_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
 * @property string $gender
 * @property string $photo
 * @property string $password
 */

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    public $table = 'users';

    public $fillable = [
        'company_id',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'email',
        'gender',
        'photo',
        'password'
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
        'middle_name' => 'string',
        'last_name' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'gender' => 'string',
        'photo' => 'string',
        'password' => 'string'
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
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'phone' => 'nullable|min:6|max:20|unique:users,phone',
            'email' => 'nullable|email|unique:users,email',
            'gender' => 'required',
            'photo' => 'nullable|file|mimes:jpg,png,jpeg',
            'password' => 'nullable'
        ];
    }
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
