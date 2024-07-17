<?php

use App\Http\Controllers\AuthController;
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


Route::view('/ventas', 'sales.index')->name('sales.index');
Route::view('/ventas/nuevo', 'sales.new')->name('sales.new');


Route::view('/caja', 'cash.index')->name('cash.index');
Route::view('/caja/{sale_id}/nuevo', 'cash.new')->name('cash.new');

Route::view('/inventario', 'stocktaking.index')->name('stocktaking.index');

Route::view('/productos', 'stocktaking.product')->name('stocktaking.product');


Route::view('/reportes', 'report.index')->name('report.index');
Route::view('/reportes/{reportId}/ventas', 'report.sales')->name('report.sales');
