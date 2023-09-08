<?php

namespace App\Providers;

use App\Services\Paginate\PaginateServiceInterface;
use App\Services\Paginate\PaginateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaginateServiceInterface::class, PaginateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
