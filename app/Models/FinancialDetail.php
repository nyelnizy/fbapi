<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class FinancialDetail
 * @package App\Models
 * @version December 4, 2022, 12:52 pm UTC
 *
 * @property string $bank_account_number
 * @property string $branch_name
 * @property string $bank_account_name
 * @property string $momo_number
 * @property string $momo_account_type
 * @property string $momo_account_name
 * @property integer $owner
 * @property string $owner_type
 */
class FinancialDetail extends Model
{


    public $table = 'financial_details';




    public $fillable = [
        'bank_account_number',
        'branch_name',
        'bank_account_name',
        'momo_number',
        'momo_account_type',
        'momo_account_name',
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
        'bank_account_number' => 'string',
        'branch_name' => 'string',
        'bank_account_name' => 'string',
        'momo_number' => 'string',
        'momo_account_type' => 'string',
        'momo_account_name' => 'string',
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
            'bank_account_number' => 'nullable',
            'branch_name' => 'nullable',
            'bank_account_name' => 'nullable',
            'momo_number' => 'nullable',
            'momo_account_type' => 'nullable',
            'momo_account_name' => 'nullable',
            'owner' => 'required',
            'owner_type' => 'required'
        ];
    }
}
