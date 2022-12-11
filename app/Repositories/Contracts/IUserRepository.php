<?php

namespace App\Repositories\Contracts;

use App\Models\RefreshToken;
use App\Models\User;

interface IUserRepository
{
    function findUserByEmail(string $email): ?User;
}
