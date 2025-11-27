<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Http\Middleware\verificaRol;
use Illuminate\Support\Facades\Route;


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
        // Define a gate for admin users
        Gate::define('administrador', function ($user) {
            return $user->rol === 'administrador';
        });

        // Define a gate for regular cliente
        Gate::define('cliente', function ($user) {
            return $user->rol === 'cliente';
        });

        // Define a gate for regular profesor
        Gate::define('profesor', function ($user) {
            return $user->rol === 'profesor';
        });

        Route::aliasMiddleware('rol', verificaRol::class);
        
    }
}
