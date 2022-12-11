<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class RefreshToken extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'token',
        'invalidated',
        'access_token_expires_at',
        'expires_at',
    ];
}
