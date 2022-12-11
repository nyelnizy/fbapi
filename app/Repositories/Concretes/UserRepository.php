<?php

namespace App\Repositories\Concretes;

use App\Models\RefreshToken;
use App\Models\User;
use App\Repositories\Contracts\IUserRepository;

class UserRepository implements IUserRepository
{
    public function findUserByEmail(string $email): ?User
    {
        return User::where("email", $email)->first();
    }
}
