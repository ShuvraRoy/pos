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
    Route::post('/get_client_data', [App\Http\Controllers\ClientController::class, 'fetch_client_data']);
    Route::post('/check_user_id', 'Central\CentralUserController@check_user_id');
    Route::post('/get_user_data', 'Central\CentralUserController@fetch_user_data');
    Route::get('/{user}/edit', 'Central\CentralUserController@edit')->name('user_edit');
    Route::post('/update', 'Central\CentralUserController@update');
    Route::post('/change_user_status', 'Central\CentralUserController@toggle_user_status');
    Route::post('/reset_user_password', 'Central\CentralUserController@reset_user_password');
    Route::post('/delete', 'Central\CentralUserController@destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
