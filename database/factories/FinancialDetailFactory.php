<?php

namespace Database\Factories;

use App\Models\FinancialDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinancialDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FinancialDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bank_account_number' => $this->faker->word,
        'branch_name' => $this->faker->word,
        'bank_account_name' => $this->faker->word,
        'momo_number' => $this->faker->word,
        'momo_account_type' => $this->faker->word,
        'momo_account_name' => $this->faker->word,
        'owner' => $this->faker->randomDigitNotNull,
        'owner_type' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
