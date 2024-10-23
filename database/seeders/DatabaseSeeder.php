<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Admin;
use App\Enums\RoleEnums;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // ? users
        $defUser = User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role' => RoleEnums::User->value,
            'password' => 'User10**',
        ]);

        // ? Owner
        $defOwner = User::factory()->create([
            'name' => 'Owner',
            'email' => 'owner@gmail.com',
            'role' => RoleEnums::Owner->value,
            'password' => 'Owner10**',
        ]);

        // ? Admin
        $defAdmin = Admin::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => RoleEnums::Admin->value,
            'password' => 'Admin10**',
        ]);

        // ? SuperAdmin
        $defSuperAdmin = Admin::factory()->create([
            'name' => 'SuperAdmin',
            'email' => 'super@gmail.com',
            'role' => RoleEnums::Super->value,
            'password' => 'Super10**',
        ]);


        //? Create 10 Users
        $users = User::factory()
            ->user()
            ->count(9)
            ->create();
        $users->push($defUser);


        //? Create 10 Owners
        $owners = User::factory()
            ->owner()
            ->count(9)
            ->create();
        $users->push($defOwner);

        //? Create 10 Admins
        $admins = Admin::factory()
            ->admin()
            ->count(9)
            ->create();
        $admins->push($defAdmin);

        //? Create 1 Super Admins
        $admins = Admin::factory()
            ->superAdmin()
            ->create();
        $admins->push($defSuperAdmin);

    }
}
