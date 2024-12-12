<?php

namespace App\Product\Infrastructure\Listeners;

use App\Events\UserAction;
use App\Models\StockReport;
use App\Product\Application\Events\StockUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculateAndSaveStockReport
{
    

    /**
     * Handle the event.
     *
     * @param  \App\Product\Application\Events\StockUpdate  $event
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
