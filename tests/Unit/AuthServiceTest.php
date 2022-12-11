<?php

namespace Tests\Unit;

use App\Exceptions\FbException;
use App\Models\RefreshToken;
use App\Models\User;
use App\Repositories\Concretes\TokenRepository;
use App\Repositories\Concretes\UserRepository;
use App\Services\Concretes\AuthService;
use App\Services\Concretes\TokenService;
use Illuminate\Support\Carbon;
use Mockery\MockInterface;
use Tests\TestCase;
gi
class AuthServiceTest extends TestCase
{
    public function test_login_user_with_valid_credentials_returns_user_and_token()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make(["id" => 1, "first_name" => "Daniel", "email" => "yhiamdan@gmail.com"]);
        $remember = false;
        $credentials = [
            "email" => "yhiamdan@gmail.com",
            "password" => "password",
            "remember_me" => $remember
        ];
        $access_token = "xx.yy.zz";
        $refresh_token = "xyz";
        $tet = now()->addMinutes(config('jwt.ttl'))->toString();
        $rtet = now()->addDays(config("fb.r_ttl"))->toString();

        $this->mock(UserRepository::class, function (MockInterface $mock) use ($user, $credentials) {
            $mock->shouldReceive('findUserByEmail')
                ->with($credentials["email"])
                ->andReturn($user);
        });

        $this->mock(TokenService::class, function (MockInterface $mock) use ($user,$remember, $access_token, $refresh_token, $tet, $rtet) {
            $mock->shouldReceive('generateToken')
                ->with($user->id)
                ->andReturn($access_token);

            $mock->shouldReceive('generateRefreshToken')
                ->andReturn($refresh_token);

            $mock->shouldReceive('generateRefreshTokenExpiryTime')
                ->with($remember)
                ->andReturn($rtet);

            $mock->shouldReceive('generateTokenExpiryTime')
                ->andReturn($tet);
        });

        $rt = [
            "user_id" => $user->id,
            "token" => $refresh_token,
            "access_token_expires_at" => $tet,
            "expires_at" => $rtet
        ];

        $rt_model = RefreshToken::factory()->make([
            "user_id" => $user->id,
            "token" => $refresh_token,
            "access_token_expires_at" => $tet,
            "expires_at" => $rtet
        ]);

        $this->mock(TokenRepository::class, function (MockInterface $mock) use ($rt, $rt_model) {
            $mock->shouldReceive('saveRefreshToken')
                ->with($rt)
                ->andReturn($rt_model);
        });

        $authService = $this->app->make(AuthService::class);
        $response = $authService->loginUser($credentials);
        $this->assertTrue($response["user"]->first_name === "Daniel");
        $this->assertTrue($response["user"]->email === "yhiamdan@gmail.com");
        $this->assertTrue($response["token"]["access_token"] === $access_token);
        $this->assertTrue($response["token"]["refresh_token"] === $refresh_token);
    }

    public function test_generate_refresh_token_expiry_time_returns_later_date_with_remember()
    {
        $ts = $this->app->make(TokenService::class);
        $tet = $ts->generateRefreshTokenExpiryTime(false);
        $rtet = $ts->generateRefreshTokenExpiryTime(true);
        $ctet = Carbon::parse($tet);
        $crtet = Carbon::parse($rtet);
        $diff = $ctet->diffInDays($crtet);
        $actual_diff = config("fb.r_ttl_w_r") - config("fb.r_ttl");
        $this->assertTrue($crtet->isAfter($ctet));
        $this->assertTrue($diff===$actual_diff);
    }
    public function test_login_user_with_bad_credentials_returns_400_bad_request()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make(["id" => 1, "first_name" => "Daniel", "email" => "yhiamdan@gmail.com"]);
        $credentials = [
            "email" => "yhiamdan@gmail.com",
            "password" => "wrongpassword",
            "remember_me" => false
        ];
        $this->mock(UserRepository::class, function (MockInterface $mock) use ($user, $credentials) {
            $mock->shouldReceive('findUserByEmail')
                ->with($credentials["email"])
                ->andReturn($user);
        });

        $authService = $this->app->make(AuthService::class);
        try {
            $authService->loginUser($credentials);
        } catch (FbException $e) {
            $this->assertTrue($e->getCode() === 400);
        }
    }

    public function test_logout_invalidates_user_token()
    {
        $this->assertTrue(true);
    }

    public function test_refresh_token_with_expired_token_returns_new_token()
    {
        $this->assertTrue(true);
    }

    public function test_refresh_token_with_valid_token_invalidates_token()
    {
        $this->assertTrue(true);
    }
}