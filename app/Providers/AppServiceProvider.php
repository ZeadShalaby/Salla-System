<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
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
        //?todo use in media morph
        Relation::enforceMorphMap([
            'Admin' => Admin::class,
            'User' => User::class,
            'Product' => Product::class,
        ]);
    }
}
