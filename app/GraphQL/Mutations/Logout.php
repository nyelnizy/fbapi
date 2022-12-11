<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Services\Concretes\AuthService;
use App\Services\Contracts\IAuthService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class Logout extends Mutation
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
        'name' => 'logout',
        'description' => "Invalidates current user's tokens"
    ];

    public function type(): Type
    {
        return Type::nonNull(Type::boolean());
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return $this->authService->logout(auth()->id());
    }
}
