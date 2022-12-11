<?php

namespace App\Services\Contracts;

interface IAuthService{
    function loginUser(array $credentials): array;
    function refreshToken(string $refresh_token): array;
    function logout(int $user_id): bool;
}