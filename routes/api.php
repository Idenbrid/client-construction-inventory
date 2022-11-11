<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [App\Http\Controllers\AuthenticationController::class, 'login']);
 /* Authenticated Routes  **/
Route::middleware('auth:sanctum')->group(function () {
    Route::controller(AuthenticationController::class)->prefix('/user')->group(function () {
        Route::get('/logout', 'logout');
        Route::post('/register', 'register');
        Route::post('/update', 'update');
        Route::get('/list', 'list');
        Route::get('/delete/{user_id}', 'delete');
    });
    // Route::controller(ItemController::class)->prefix('/item')->group(function () {
    //     Route::post('/save', 'store');
    //     Route::post('/update', 'update');
    //     Route::get('/list', 'list');
    //     Route::get('/delete/{item_id}', 'delete');
    // });
    // Route::controller(WarehouseController::class)->prefix('/warehouse')->group(function () {
    //     Route::post('/save', 'store');
    //     Route::post('/update', 'update');
    //     Route::get('/list', 'list');
    //     Route::get('/delete/{warehouse_id}', 'delete');
    // });
    Route::resource('item', ItemController::class);
    Route::resource('warehouse', WarehouseController::class);
    Route::resource('supplier', SupplierController::class);

});