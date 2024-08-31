<?php

namespace App\Listeners;

use App\Events\StockUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateAndSaveStockReport
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\StockUpdate  $event
     * @return void
     */
    public function handle(StockUpdate $event)
    {
        //
    }
}
