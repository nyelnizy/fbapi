<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AuthToken extends GraphQLType
{
    protected $attributes = [
        'name' => 'AuthToken',
        "description" => "An object that contains the user's access and refresh token"
    ];

    public function fields(): array
    {
        return [
            "access_token" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "The user's access token for authorized requests. Add to request header like so: {Authorization: Bearer access_token}"
            ],
            "refresh_token" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "Use this to request for new token when access_token expires using the {refreshToken} query"
            ],
            "refresh_token_expire_date" => [
                "type" => Type::nonNull(Type::string()),
                "description" => "This indicates how long the refresh_token is valid for"
            ]
        ];
    }
}
