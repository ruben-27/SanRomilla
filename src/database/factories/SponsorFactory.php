<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SponsorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'image' => $this->faker->filePath(),
            'url' => $this->faker->url(),
        ];
    }
}
