<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Passport::loadKeysFrom(__DIR__ . '/../secrets/oauth');

        //?todo use in media morphphp artisan vendor:publish --tag=passport-config

        Relation::enforceMorphMap([
            'Admin' => Admin::class,
            'User' => User::class,
            'Product' => Product::class,
        ]);
    }
}
