<?php

namespace App\Providers;

use App\Repositories\Contracts\CategoryRepository as CategoryRepositoryContract;
use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\WrestlerRepository as WrestlerRepositoryContract;
use App\Repositories\WrestlerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(WrestlerRepositoryContract::class, WrestlerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
