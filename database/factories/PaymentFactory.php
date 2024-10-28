<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_method' => $this->faker->randomElement(['credit card', 'PayPal', 'bank transfer', 'cash']),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'transaction_id' => $this->faker->unique()->regexify('[A-Za-z0-9]{20}'),
        ];
    }
}
