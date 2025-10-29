<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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
        Gate::define('manage-users', function (User $user) {
            return $user->hasRole('admin');
        });

        Gate::define('manage-crimes', function (User $user) {
            return $user->hasRole('officer') || $user->hasRole('dispatcher');
        });

        Gate::define('view-reports', function (User $user) {
            return $user->hasRole('chief');
        });
    }
}
