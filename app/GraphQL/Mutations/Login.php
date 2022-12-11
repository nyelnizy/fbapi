<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Services\Concretes\AuthService;
use App\Services\Contracts\IAuthService;
use App\Validations\FbValidations;
use Closure;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class Login extends Mutation
{
    /**
     * @var AuthService
     */
    private $authService;
    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }
    protected $attributes = [
        'name' => 'login',
        'description' => 'A mutation to login users based on the supplied credentials'
    ];

    public function type(): Type
    {
        return Type::nonNull(GraphQL::type("LoginResponse"));
    }

    public function args(): array
    {
        return [
           "credentials"=> [
            "type"=> Type::nonNull(GraphQL::type("Credentials")),
           ],
        ];
    }
    protected function rules(array $args = []): array
    {
        return FbValidations::$credentials;
    }
    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return $this->authService->loginUser($args);
    }
}
