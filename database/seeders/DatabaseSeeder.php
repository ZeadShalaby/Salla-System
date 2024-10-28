<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Product;
use App\Enums\RoleEnums;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Favourite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
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

        //? Create 10 Categories
        $category = Category::factory()->count(20)->create();

        //? Create 50 Products
        $product = Product::factory()->count(50)->create();

        //? Create 10 Payments
        $payment = Payment::factory()->count(10)->create();

        //? create 10 orders
        $order = Order::factory()->count(10)->create();

        //? Create 10 Carts
        $carts = Cart::factory()->count(10)->create();

        //? Create 60 Reviews
        $review = Review::factory()->count(60)->create();

        //? Create 20 Favorites
        $favourite = Favourite::factory()->count(20)->create();

        //? create 30 discount
        $discount = Discount::factory()->count(30)->create();


    }
}
