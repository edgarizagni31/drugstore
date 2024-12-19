<?php

namespace App\Providers;

use App\Src\Products\Application\Events\StockUpdate;
use App\Src\Products\Infrastructure\Listeners\CalculateAndSaveStockReport;
use App\Src\Users\Application\Events\UserAction;
use App\Src\Users\Infrastructure\SaveUserAction;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserAction::class => [
            SaveUserAction::class
        ],
        StockUpdate::class => [
            CalculateAndSaveStockReport::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
