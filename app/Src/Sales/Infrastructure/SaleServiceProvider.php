<?php

namespace App\Src\Sales\Infrastructure;

use App\Src\Sales\Domain\SaleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class SaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
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
