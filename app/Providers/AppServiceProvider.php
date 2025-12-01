<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\User;
use App\Policies\AuthorPolicy;
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
        // Gate::policy(Author::class, AuthorPolicy::class);
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
        Gate::before(function (User $user, string $ability) {
            if ($user->role=='admin') {
                return true;
            }
        });
        Auth::provider('admins', function (Application $app, array $config) {
            return new RoleProvider('admin');
        });
    }
}
