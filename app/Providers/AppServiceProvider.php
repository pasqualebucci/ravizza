<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\View;
use App\Models\Texture;

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
        Model::unguard();
        // Evita di fare query se siamo in console (artisan)
        if (app()->runningInConsole()) {
            View::share('firstTessuto', null);
            return;
        }

        // Prova a prendere il primo tessuto, senza far crashare l'app
        try {
            $firstTessuto = Texture::first();
        } catch (\Throwable $e) {
            $firstTessuto = null;
        }

        View::share('firstTessuto', $firstTessuto);
    }
}
