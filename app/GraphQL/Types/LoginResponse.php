<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LoginResponse extends GraphQLType
{
    protected $attributes = [
        'name' => 'LoginResponse',
        'description' => "The user's details after successful login"
    ];

    public function fields(): array
    {
        return [
            "token" => [
                "type" => Type::nonNull(GraphQL::type("AuthToken")),
            ],
            "user"=> [
                "type"=> Type::nonNull(GraphQL::type("AuthUser")),
            ]
        ];
    }
}
