<?php

namespace Database\Factories;

use App\Models\User;
use App\Enums\RoleEnums;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'phone' => $this->faker->phoneNumber,
            'role' => RoleEnums::User->value,
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }


    /**
     * Configure the factory with relationships.
     *
     * @return $this
     */
    public function configure()
    {

        return $this->afterCreating(function (User $user) {
            $img = ["/api/imageusers/users", "/api/imageusers/user1", "/api/imageusers/user2", "/api/imageusers/user3", "/api/imageusers/user5"];
            $increment = random_int(0, 3);
            $user->media()->create([
                'media' => $img[$increment],
            ]);
        });
    }


    // ?todo fake owner
    public function owner()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => RoleEnums::Owner->value,
            ];
        });
    }

    // ?todo fake user 
    public function user()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => RoleEnums::User->value,
            ];
        });
    }
}
