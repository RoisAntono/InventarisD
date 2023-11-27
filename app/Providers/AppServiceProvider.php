<?php

namespace App\Providers;

use Nette\Utils\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

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

        Gate::define('admin', function(User $user) {
            // return $user->username === 'hasan';
            return $user->level_admin;
        });
    }
}
