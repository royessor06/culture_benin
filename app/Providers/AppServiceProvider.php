<?php

namespace App\Providers;

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
        // Configuration FedaPay
        config([
            'services.fedapay' => [
                'api_key' => env('FEDAPAY_API_KEY'),
                'mode' => env('FEDAPAY_MODE', 'sandbox'),
                'token' => env('FEDAPAY_TOKEN'),
            ]
        ]);
    }
}
