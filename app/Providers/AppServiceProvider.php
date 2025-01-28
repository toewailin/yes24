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
        // You do not need to bind the Role class manually.
        // Spatie automatically handles this.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        //Blade::component('frontend-layout', \App\View\Components\FrontendLayout::class);
    }
}
