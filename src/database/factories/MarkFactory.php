<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Year;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'place' => $this->faker->unique(true)->numberBetween(1, 100),
            'dorsal' => $this->faker->unique(true)->numberBetween(1, 100),
            'time' => $this->faker->time(),
            'pace' => $this->faker->time(),
            'gender' => $this->faker->randomElement(['m', 'f']),
            'category_id' => Category::inRandomOrder()->first(),
            'year_id' => 3
        ];
    }
}
