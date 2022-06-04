<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $age = $this->faker->numberBetween(3, 18);
        return [
            'name' => $this->faker->word(),
            'min_age' => $age,
            'max_age' => $age + 5,
            'KM' => $this->faker->numberBetween(2.00, 12.99),
            'start_time' => $this->faker->time(),
            'price' => $this->faker->numberBetween(3.00, 15.99),
            'status' => $this->faker->randomElement(['n', 'c', 'f'])
        ];
    }
}
