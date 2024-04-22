<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CarRepositoryInterface;
use App\Repositories\CarRepository;
use App\Interfaces\ClientRepositoryInterface;
use App\Repositories\ClientRepository;
use App\Interfaces\ImageRepositoryInterface;
use App\Repositories\ImageRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CarRepositoryInterface::class,CarRepository::class);
        $this->app->bind(ClientRepositoryInterface::class,ClientRepository::class);
        $this->app->bind(ImageRepositoryInterface::class,ImageRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}