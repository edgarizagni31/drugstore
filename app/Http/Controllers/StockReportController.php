<?php

namespace App\Http\Controllers;

use App\Events\UserAction;
use App\Models\Product;
use App\Models\StockReport;
use Auth;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    public function index(Product $product)
    {
        $stockReports = $product->stockReports;
        return view('stock_reports.index', compact('stockReports', 'product'));
    }

    // Eliminar un reporte de stock y actualizar su estado
    public function destroy(StockReport $stockReport)
    {
        $stockReport->update(['status' => false]);

        UserAction::dispatch(Auth::user(), 'STOCK_REPORT_DELETE', $stockReport);

        return redirect()->route('products.stockReports.index', $stockReport->product_id)
            ->with('success', 'Reporte de stock marcado como eliminado.');
    }
}
