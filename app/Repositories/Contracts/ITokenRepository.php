<?php

namespace App\Repositories\Contracts;

use App\Models\RefreshToken;

interface ITokenRepository{
    function findRefreshToken(string $refresh_token): ?RefreshToken;
    function findRefreshTokenByUserId(int $user_id): ?RefreshToken;
    function saveRefreshToken(array $rt): ?RefreshToken;
    function updateRefreshToken(RefreshToken $rt,array $data): void;
}