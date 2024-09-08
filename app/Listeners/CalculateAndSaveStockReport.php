<?php

namespace App\Listeners;

use App\Events\StockUpdate;
use App\Events\UserAction;
use App\Models\StockReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateAndSaveStockReport
{
    

    /**
     * Handle the event.
     *
     * @param  \App\Events\StockUpdate  $event
     * @return void
     */
    public function handle(StockUpdate $event)
    {
        $quantityDifference = $event->newQuantity - $event->oldQuantity;

        $stockReport = StockReport::create([
            'quanty' => $quantityDifference,
            'status' => true,
            'product_id' => $event->product->id,
        ]);

        UserAction::dispatch($event->user, 'STOCK_UPDATE', $stockReport);

    }
}
