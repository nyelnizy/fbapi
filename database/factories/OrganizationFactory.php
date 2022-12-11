<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'organization_id' => $this->faker->word,
        'registered_by' => $this->faker->randomDigitNotNull,
        'membership_size_id' => $this->faker->randomDigitNotNull,
        'organization_id' => $this->faker->word,
        'name' => $this->faker->word,
        'biography' => $this->faker->word,
        'date_established' => $this->faker->date('Y-m-d H:i:s'),
        'date_joined' => $this->faker->date('Y-m-d H:i:s'),
        'join_reason_id' => $this->faker->randomDigitNotNull,
        'logo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
