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
    Route::post('/date_filter', [App\Http\Controllers\SalesReportController::class, 'date_filter']);
    Route::post('/get_sales_report_data', [App\Http\Controllers\SalesReportController::class, 'fetch_sales_report_data']);
});
Route::prefix('cleared_sales_report')->group(function (){
    Route::get('/', [App\Http\Controllers\ClearedSalesReportController::class, 'index']);
    Route::post('/date_filter', [App\Http\Controllers\ClearedSalesReportController::class, 'date_filter']);
    Route::post('/get_cleared_sales_report_data', [App\Http\Controllers\ClearedSalesReportController::class, 'fetch_cleared_sales_report_data']);
});
Route::prefix('pending_sales_report')->group(function (){
    Route::get('/', [App\Http\Controllers\PendingSalesReportController::class, 'index']);
    Route::post('/date_filter', [App\Http\Controllers\PendingSalesReportController::class, 'date_filter']);
    Route::post('/get_pending_sales_report_data', [App\Http\Controllers\PendingSalesReportController::class, 'fetch_pending_sales_report_data']);
});
Route::prefix('users')->group(function (){
    Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\UserController::class, 'update']);
    Route::post('/delete', [App\Http\Controllers\UserController::class, 'delete']);
    Route::post('/get_user_data', [App\Http\Controllers\UserController::class, 'fetch_user_data']);
});
Route::prefix('providers')->group(function (){
    Route::get('/', [App\Http\Controllers\ProviderController::class, 'index']);
    Route::post('/store', [App\Http\Controllers\ProviderController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\ProviderController::class, 'update']);
    Route::post('/delete', [App\Http\Controllers\ProviderController::class, 'delete']);
    Route::post('/get_provider_data', [App\Http\Controllers\ProviderController::class, 'fetch_provider_data']);
});
Route::prefix('accounts_receivable')->group(function (){
    Route::get('/', [App\Http\Controllers\ReceivableAccountsController::class, 'index']);
    Route::post('/date_filter', [App\Http\Controllers\ReceivableAccountsController::class, 'date_filter']);
    Route::get('/{client}/client_sales', [App\Http\Controllers\ReceivableAccountsController::class, 'client_sales'])->name('client_sales');
    Route::post('/get_receivable_accounts_data', [App\Http\Controllers\ReceivableAccountsController::class, 'fetch_receivable_accounts_data']);
});
Route::prefix('pos')->group(function (){
    Route::get('/', [App\Http\Controllers\PosController::class, 'index']);
    Route::get('/get_article_data', [App\Http\Controllers\PosController::class, 'fetch_article_data']);
    Route::post('/store', [App\Http\Controllers\PosController::class, 'store']);
    Route::post('/store_inventory', [App\Http\Controllers\PosController::class, 'store_inventory']);
    Route::post('/store_client', [App\Http\Controllers\PosController::class, 'store_client']);
    Route::post('/get_receivable_accounts_data', [App\Http\Controllers\PosController::class, 'fetch_receivable_accounts_data']);
});
Route::prefix('sales_history')->group(function (){
    Route::get('/', [App\Http\Controllers\SalesHistoryController::class, 'index']);
    Route::post('/store_payment', [App\Http\Controllers\SalesHistoryController::class, 'store_payment']);
    Route::post('/store_modified_sale', [App\Http\Controllers\SalesHistoryController::class, 'store_modified_sale']);
    Route::get('/get_article_data', [App\Http\Controllers\SalesHistoryController::class, 'fetch_article_data']);
    Route::get('/{sale}/edit_sale', [App\Http\Controllers\SalesHistoryController::class, 'edit_sale'])->name('edit_sale');
    Route::post('/edit_delivery', [App\Http\Controllers\SalesHistoryController::class, 'edit_delivery']);
    Route::post('/edit_status', [App\Http\Controllers\SalesHistoryController::class, 'edit_status']);
    Route::post('/delete', [App\Http\Controllers\SalesHistoryController::class, 'delete']);
    Route::post('/payment_date', [App\Http\Controllers\SalesHistoryController::class, 'payment_date']);
    Route::post('/add_payment', [App\Http\Controllers\SalesHistoryController::class, 'add_payment']);
    Route::get('/{sale}/archive', [App\Http\Controllers\SalesHistoryController::class, 'archive'])->name('archive');
    Route::post('/get_sales_history_data', [App\Http\Controllers\SalesHistoryController::class, 'fetch_sales_history_data']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
