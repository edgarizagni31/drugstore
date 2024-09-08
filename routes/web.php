<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StockReportController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');


Route::view('/caja', 'cash.index')->name('cash.index');
Route::view('/caja/{sale_id}/nuevo', 'cash.new')->name('cash.new');

Route::resource('categories', CategoryController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('products', ProductController::class);

Route::get('product/{product}/stockReport', [StockReportController::class, 'index'])->name('products.stockReports.index');
Route::delete('stockReports/{stockReport}', [StockReportController::class, 'destroy'])->name('stockReports.destroy');

Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('reports/create', [ReportController::class, 'create'])->name('reports.create');

Route::post('reports', [ReportController::class, 'store'])->name('reports.store');

Route::post('reports/close', [ReportController::class, 'close'])->name('reports.close');

Route::get('sales/create', [SaleController::class, 'create'])->name('sales.create');

Route::post('sales', [SaleController::class, 'store'])->name('sales.store');

Route::get('sales', [SaleController::class, 'index'])->name('sales.index');

Route::get('sales/{saleId}/tickets', [TicketController::class, 'index'])->name('tickets.index');

Route::put('sales/{sale}/{status}', [SaleController::class, 'updateStatus'])->name('sales.updateStatus');