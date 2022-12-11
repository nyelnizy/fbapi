<?php

namespace App\Services\Contracts;

interface ITokenService{
    function generateToken(int $user_id): ?string;
    function invalidateToken(): void;
    function generateRefreshToken(): string;
    function generateRefreshTokenExpiryTime(bool $remember): string;
    function generateTokenExpiryTime(): string;
}