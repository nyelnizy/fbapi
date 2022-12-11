<?php

namespace App\Services\Concretes;

use App\Exceptions\FbException;
use App\Repositories\Contracts\IUserRepository;
use App\Services\Contracts\IAuthService;
use App\Repositories\Contracts\ITokenRepository;
use App\Services\Contracts\ITokenService;
use Hash;
use Ramsey\Uuid\Uuid;

class AuthService implements IAuthService
{
    /**
     * @var \App\Repositories\Concretes\UserRepository
     */
    private $userRepository;

    /**
     * @var TokenService
     */
    private $tokenService;

    /**
     * @var \App\Repositories\Concretes\TokenRepository
     */
    private $tokenRepository;

    public function __construct(
        IUserRepository $userRepository,
        ITokenService $tokenService,
        ITokenRepository $tokenRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->tokenService = $tokenService;
        $this->tokenRepository = $tokenRepository;
    }
    /**
     * Validates and authenticates a user based on received credentials.
     * @param array $credentials
     * @return array
     */
    public function loginUser(array $credentials): array
    {
        $user = $this->userRepository->findUserByEmail($credentials["email"]);
        if (!$user || !Hash::check($credentials["password"], $user->password)) {
            throw new FbException("Invalid email or password", 400);
        }
        $rtet = $this->tokenService->generateRefreshTokenExpiryTime($credentials["remember_me"]);
        $tet = $this->tokenService->generateTokenExpiryTime();
        $token = $this->tokenService->generateToken($user->id);
        if (!$token) {
            throw new FbException("Failed to generate jwt token", 500);
        }
        $refresh_token = $this->tokenService->generateRefreshToken();
        $rt = [
            'user_id' => $user->id,
            'token' => $refresh_token,
            'access_token_expires_at' => $tet,
            'expires_at' => $rtet,
        ];
        $rt = $this->tokenRepository->saveRefreshToken($rt);
        if (empty($rt)) {
            throw new FbException("Failed to save generate refresh token", 500);
        }
        return [
            'user' => $user,
            'token' => [
                "access_token" => $token,
                "refresh_token" => $refresh_token,
                "refresh_token_expire_date" => $rt->access_token_expires_at
            ]
        ];
    }
    /**
     * Refreshes an expired token, passing a valid token may result in invalidation
     * @param string $refresh_token
     * @return array
     * @throws FbException
     */
    public function refreshToken(string $refresh_token): array
    {
        $r_t = $this->tokenRepository->findRefreshToken($refresh_token);
        // if client is trying to refresh token when its not expired,
        // that's not good, invalidate refresh token and force user to login
        if ($r_t->access_token_expires_at >= now()) {
            $this->tokenRepository->updateRefreshToken($r_t, ['invalidated' => true]);
            throw new FbException("Invalid refresh token", 400);
        }
        $token = $this->tokenService->generateToken($r_t->user_id);
        $tet = $this->tokenService->generateTokenExpiryTime();
        //reset access token expire time
        $this->tokenRepository
            ->updateRefreshToken($r_t, [
                'access_token_expires_at' => $tet
            ]);

        return ['access_token' => $token, 'refresh_token' => $r_t->token];
    }
    /**
     * Invalidates current user's token
     * @param int $user_id
     * @return bool
     */
    public function logout(int $user_id): bool
    {
        $t = $this->tokenRepository->findRefreshTokenByUserId($user_id);
        if ($t) {
            $this->tokenRepository->updateRefreshToken($t, ['invalidated' => true]);
        }
        $this->tokenService->invalidateToken();
        return true;
    }
}