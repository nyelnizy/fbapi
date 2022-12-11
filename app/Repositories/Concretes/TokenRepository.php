<?php

namespace App\Repositories\Concretes;

use App\Models\RefreshToken;
use App\Repositories\Contracts\ITokenRepository;

class TokenRepository implements ITokenRepository
{
    public function findRefreshTokenByUserId(int $user_id): ?RefreshToken
    {
        return RefreshToken::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')->first();
    }
    public function saveRefreshToken(array $rt): ?RefreshToken
    {
        return RefreshToken::create($rt);
    }
    public function findRefreshToken(string $refresh_token): ?RefreshToken
    {
        return RefreshToken::where('token', $refresh_token)
            ->whereDate('expires_at', '>=', (string)now())
            ->where('invalidated', false)
            ->first();
    }

    public function updateRefreshToken(RefreshToken $rt, array $data): void
    {
        $rt->fill($data);
        $rt->save();
    }
}
