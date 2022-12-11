<?php

namespace App\Providers;

use App\Repositories\Concretes\TokenRepository;
use App\Repositories\Concretes\UserRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Services\Concretes\AuthService;
use App\Services\Concretes\TokenService;
use App\Services\Contracts\IAuthService;
use App\Repositories\Contracts\ITokenRepository;
use App\Services\Contracts\ITokenService;
use Illuminate\Support\ServiceProvider;

class FbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ITokenService::class, TokenService::class);
        $this->app->bind(ITokenRepository::class, TokenRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}