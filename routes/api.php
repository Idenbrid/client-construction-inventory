<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SiteController;
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
    Route::resource('site', SiteController::class);
    Route::resource('item', ItemController::class);
    Route::resource('warehouse', WarehouseController::class);
    Route::resource('supplier', SupplierController::class);
    Route::controller(OrderController::class)->group(function () {
        Route::get('/get-settings', 'getSettings');
        Route::get('/orders/{orderd}', 'list');
        Route::get('/order/{orderd_id}', 'edit');
        Route::post('/order', 'postOrder');
        Route::patch('/order', 'updateOrder');
        Route::post('/move-to-delivery-list', 'moveToDelivery');
        Route::get('/move-to-use-list/{order_id}', 'moveToUse');
        Route::get('/all-used/{order_id}', 'allItemUsed');
        Route::get('/get-orders-used-using', 'getOrderUsedUsing');
        Route::post('/save-remaining', 'saveRemaining');
        Route::get('/get-remaining-list', 'getRemainingList');
        Route::post('/reserve-order', 'reserveOrder');
        Route::get('/get-related-reserve-orders/{order_id}', 'reserveOrders');
        Route::post('/reserve-to-using', 'reserveToUsing');
    });

});