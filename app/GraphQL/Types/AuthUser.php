<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AuthUser extends GraphQLType
{
    protected $attributes = [
        'name' => 'AuthUser',
        "description" => "The currently logged in user"
    ];

    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::nonNull(Type::int())
            ],
            "first_name" => [
                "type" => Type::nonNull(Type::string()),
            ],
            "middle_name" => [
                "type" => Type::string(),
            ],
            "last_name" => [
                "type" => Type::nonNull(Type::string()),
            ],
            "phone" => [
                "type" => Type::nonNull(Type::string()),
            ],
            "email" => [
                "type" => Type::nonNull(Type::string()),
            ],
            "status" => [
                "type" => Type::nonNull(Type::boolean()),
            ],
        ];
    }
}
