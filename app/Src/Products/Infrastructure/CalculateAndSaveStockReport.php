<?php

namespace App\Src\Products\Infrastructure;

use App\Models\StockReport;
use App\Src\Products\Application\Events\StockUpdate;
use App\Src\Users\Infrastructure\Events\UserAction;

class CalculateAndSaveStockReport
{
    

    /**
     * Handle the event.
     *
     * @param  \App\Src\Products\Application\Events\StockUpdate  $event
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
