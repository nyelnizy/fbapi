<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'registered_by' => $this->faker->randomDigitNotNull,
        'organization_id' => $this->faker->randomDigitNotNull,
        'member_id' => $this->faker->word,
        'first_name' => $this->faker->word,
        'middle_name' => $this->faker->word,
        'last_name' => $this->faker->word,
        'gender' => $this->faker->word,
        'dob' => $this->faker->word,
        'occupation' => $this->faker->word,
        'educational_level' => $this->faker->word,
        'date_joined' => $this->faker->date('Y-m-d H:i:s'),
        'photo' => $this->faker->word,
        'marital_status' => $this->faker->word,
        'number_of_dependencies' => $this->faker->randomDigitNotNull,
        'password' => $this->faker->word,
        'status' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
