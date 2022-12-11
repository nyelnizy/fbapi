<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class Credentials extends InputType
{
    protected $attributes = [
        'name' => 'Credentials',
        'description' => "The user's credentials to use for login",
    ];

    public function fields(): array
    {
        return [
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "The user's email used for account registration",
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "The user's password used for account registration",
            ],
            'remember_me' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => "Indicates whether the user should be remembered during login. If true, the ttl of refresh token will be extended to {1 month}",
            ],
            
        ];
    }
}
