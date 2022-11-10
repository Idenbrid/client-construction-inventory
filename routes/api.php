<?php

use App\Http\Controllers\AuthenticationController;
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
        Route::get('/list', 'list');
        Route::get('/delete/{user_id}', 'delete');
    });

});