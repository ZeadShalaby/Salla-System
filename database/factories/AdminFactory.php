<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Enums\RoleEnums;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AdminFactory extends Factory
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
            'password' => 'admin',
            'phone' => $this->faker->phoneNumber,
            'role' => RoleEnums::Admin->value,
            'email_verified_at' => now(),
        ];
    }


    /**
     * Configure the factory with relationships.
     *
     * @return $this
     */
    public function configure()
    {

        return $this->afterCreating(function (Admin $admin) {
            $img = ["/api/imageusers/users", "/api/imageusers/user1", "/api/imageusers/user2", "/api/imageusers/user3", "/api/imageusers/user5"];
            $increment = random_int(0, 3);
            $admin->media()->create([
                'media' => $img[$increment],
            ]);
        });
    }



    // ?todo fake admin
    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => RoleEnums::Admin->value,
            ];
        });
    }

    // ?todo fake admin
    public function superAdmin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => RoleEnums::Super->value,
            ];
        });
    }
}
