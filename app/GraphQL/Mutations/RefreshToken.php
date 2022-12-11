<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Services\Contracts\IAuthService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class RefreshToken extends Mutation
{
    /**
     * @var \App\Services\Concretes\AuthService
     */
    private $authService;
    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }
    protected $attributes = [
        'name' => 'refreshToken',
        'description' => "Refreshes a user's expired access token"
    ];

    public function type(): Type
    {
        return Type::nonNull(GraphQL::type("AuthToken"));
    }

    public function args(): array
    {
        return [
            "refresh_token" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "A valid refresh token received during login or refresh token"
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return $this->authService->refreshToken($args["refresh_token"]);
        ;
    }
}