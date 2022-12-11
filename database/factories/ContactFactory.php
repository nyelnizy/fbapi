<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'owner' => $this->faker->randomDigitNotNull,
        'owner_type' => $this->faker->word,
        'phone' => $this->faker->word,
        'secondary_phone' => $this->faker->word,
        'email' => $this->faker->word,
        'website' => $this->faker->word,
        'facebook' => $this->faker->word,
        'twitter' => $this->faker->word,
        'linkedin' => $this->faker->word,
        'box_number' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
