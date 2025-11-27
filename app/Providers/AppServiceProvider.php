<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        //
        Paginator::useBootstrapFive();
        // Auth::extend('admin', function(Application $app, string $name, array $config){
        //     return Auth::user()->role=='admin';
        // });
        Gate::define('admin-gate',function(User $user){
            return $user->role == 'admin';
        });
        Gate::define('librarian-gate',function(User $user){
            return $user->role == 'librarian';
        });
    }
}
