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
            "name" => [
                'en' => fake()->sentence(7),
                'ar' => fake()->sentence(7),
            ],
            "description" => [
                'en' => fake()->sentence(),
                'ar' => fake()->sentence(),
            ],
            "date" => fake()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            "time" => fake()->randomDigit(),
            "is_active" => (int) fake()->boolean(),
            'start_time' => fake()->time('H:i'), // e.g., "14:30"
            'percentage' => fake()->randomFloat(1, 5, 50),
        ];
    }
}
