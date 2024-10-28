<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "discount" => $this->faker->numberBetween(1, 100), //? persentage 
            "expire_at" => $this->faker->optional()->dateTimeBetween('now', '+2 years'),
        ];
    }
}
