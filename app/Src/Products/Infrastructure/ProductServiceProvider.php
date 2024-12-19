<?php

namespace App\Src\Products\Infrastructure;


use App\Src\Products\Domain\ProductRepositoryInterface;
use App\Src\Products\Infrastructure\EloquentProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, EloquentProductRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
