<?php

namespace App\Providers;

use App\Services\GeneralService;
use App\Services\Interfaces\GeneralServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GeneralServiceInterface::class, GeneralService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
