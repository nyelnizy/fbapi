<?php

namespace Database\Factories;

use App\Models\CompanyCurrency;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyCurrencyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyCurrency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->randomDigitNotNull,
        'current_currency' => $this->faker->randomDigitNotNull,
        'conversion_currency' => $this->faker->randomDigitNotNull,
        'current_rate' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
