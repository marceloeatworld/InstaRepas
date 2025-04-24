<?php

namespace App\Providers;

use App\Mail\Transport\PlunkTransport;
use App\Services\PlunkService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PlunkService::class, function ($app) {
            return new PlunkService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        
        // Corriger l'enregistrement du transport Plunk
        Mail::extend('plunk', function ($config) {
            return new PlunkTransport(app(PlunkService::class));
        });
    }
}