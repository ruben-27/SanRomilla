<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::inRandomOrder()->first();
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->randomNumber(8) . $this->faker->randomElement(['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K']),
            'email' => $this->faker->unique()->safeEmail(),
            'birthday' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['m', 'f']),
            'phone' => $this->faker->e164PhoneNumber(),
            'amount' => $this->faker->numberBetween(4, 900),
            'size' => $this->faker->randomElement(['xxs', 'xs', 's', 'm', 'l', 'xl', 'xxl', null]),
            'category_id' => $category->id,
            'dorsal' => $this->faker->unique()->numberBetween(1, 100),
            'inscription_number' => $this->faker->unique()->randomNumber(6),
            'paid' => $this->faker->randomElement([0, 1])
        ];
    }
}
