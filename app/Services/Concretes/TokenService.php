<?php

namespace App\Services\Concretes;

use App\Services\Contracts\ITokenService;
use Ramsey\Uuid\Uuid;

class TokenService implements ITokenService
{
    public function generateToken(int $user_id): ?string
    {
        return auth()->tokenById($user_id);
    }
    public function invalidateToken(): void
    {
        auth()->logout();
    }

    public function generateRefreshToken(): string
    {
        return Uuid::uuid4();
    }
    /**
     * @return string
     */
    public function generateRefreshTokenExpiryTime(bool $remember): string
    {
        $ttl = $remember ? config('fb.r_ttl_w_r') : config('fb.r_ttl');
        return now()->addDays($ttl);
    }

    /**
     * @return string
     */
    public function generateTokenExpiryTime(): string
    {
        return now()->addMinutes(config('jwt.ttl'));
    }
}