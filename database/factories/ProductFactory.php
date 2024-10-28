<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 1, 1000), // Price with 2 decimal points between 1 and 1000
            'user_id' => User::factory(),
            'category_id' => Category::factory(), // Assuming you have a Category factory
            'discount_id' => Discount::factory(), // Assuming you have a Discount factory
            'quantity' => $this->faker->numberBetween(1, 100),
            'expire_at' => $this->faker->optional()->dateTimeBetween('now', '+2 years'), // Nullable
        ];
    }
}
