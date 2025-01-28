<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlashSale>
 */
class FlashSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(), // Generates a random date
            'time' => $this->faker->numberBetween(10, 100), // Generates a random time
            'is_active' => $this->faker->boolean(), // Randomly true (1) or false (0)
        ];
    }
}