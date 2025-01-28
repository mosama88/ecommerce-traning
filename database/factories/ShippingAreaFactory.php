<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShippingArea>
 */
class ShippingAreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city(), // Generates a random city name
            'fee' => $this->faker->randomFloat(2, 5, 100), // Generates a random fee between 5 and 100 with 2 decimal places
        ];
    }
}
