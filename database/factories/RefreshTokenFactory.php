<?php

namespace Database\Factories;

use App\Models\RefreshToken;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefreshToken>
 */
class RefreshTokenFactory extends Factory
{
    protected $model = RefreshToken::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id" => 1,
            "token" => "xxyyzz",
            "validated"=>$this->faker->boolean(),
            "access_token_expires_at" => 0,
            "expires_at" => 1,
        ];
    }
}
