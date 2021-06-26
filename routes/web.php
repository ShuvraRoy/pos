<?php

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

//Route::get('/', function () {
//    return view('auth/login');
//});

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'get_login'])->name('login');
Route::post('/post_login',[App\Http\Controllers\Auth\LoginController::class, 'post_login']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::group(['middleware'=> 'auth'], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
    Route::get('/session', function(){
//        dd(Request::session());
    });
});

Route::prefix('clients')->group(function (){
    Route::get('/', [App\Http\Controllers\ClientController::class, 'index']);
    Route::post('/store', [App\Http\Controllers\ClientController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\ClientController::class, 'update']);
    Route::post('/delete', [App\Http\Controllers\ClientController::class, 'delete']);
    Route::get('/{client}/client_sales', [App\Http\Controllers\ClientController::class, 'client_sales'])->name('client_sales');
    Route::post('/get_client_data', [App\Http\Controllers\ClientController::class, 'fetch_client_data']);
});
Route::prefix('inventory')->group(function (){
    Route::get('/', [App\Http\Controllers\InventoryController::class, 'index']);
    Route::post('/store', [App\Http\Controllers\InventoryController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\InventoryController::class, 'update']);
    Route::post('/delete', [App\Http\Controllers\InventoryController::class, 'delete']);
   // Route::get('/{client}/client_sales', [App\Http\Controllers\InventoryController::class, 'client_sales'])->name('client_sales');
    Route::post('/get_inventory_data', [App\Http\Controllers\InventoryController::class, 'fetch_inventory_data']);
});
Route::prefix('sales_report')->group(function (){
    Route::get('/', [App\Http\Controllers\SalesReportController::class, 'index']);
    Route::post('/store', [App\Http\Controllers\InventoryController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\InventoryController::class, 'update']);
    Route::post('/date_filter', [App\Http\Controllers\SalesReportController::class, 'date_filter']);
    // Route::get('/{client}/client_sales', [App\Http\Controllers\InventoryController::class, 'client_sales'])->name('client_sales');
    Route::post('/get_sales_report_data', [App\Http\Controllers\SalesReportController::class, 'fetch_sales_report_data']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
