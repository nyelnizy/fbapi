<?php

namespace App\Validations;

class FbValidations
{
    public static $credentials = [
        'email' => ['required', 'email'],
        'password' => ['required'],
        'remeber_me' => ['required','boolean'],
    ];
}
