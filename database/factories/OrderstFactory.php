<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderstFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_num' => $this->faker->unique()->numberBetween(1000, 9999), // Unique order number
            'total_amount' => $this->faker->randomFloat(2, 50, 5000), // Total amount between 50 and 5000
            'user_id' => User::factory(), // Assuming you have a User factory
            'product_id' => Product::factory()->nullable(), // Nullable product_id
            'payment_id' => Payment::factory()->nullable(), // Nullable payment_id
            'price' => $this->faker->numberBetween(50, 500), // Random price between 50 and 500
        ];
    }
}
