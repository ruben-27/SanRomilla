<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
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
            'amount' => $this->faker->numberBetween(3, 900),
            'size' => $this->faker->randomElement(['xxs', 'xs', 's', 'm', 'l', 'xl', 'xxl', null])
        ];
    }
}
