<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserInterface;
use App\Repositories\UserRepository;
use App\Interfaces\ManageInterface;
use App\Repositories\ManageRepository;
use App\Repositories\ProductRepository;
use App\Interfaces\ProductInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(ManageInterface::class, ManageRepository::class);
        $this->app->bind(ProductInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
