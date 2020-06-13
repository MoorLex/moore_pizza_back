<?php

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


Route::namespace('api')->group(function () {
    Route::get('pizzas/popular', 'PizzaController@popular');
    Route::apiResource('pizzas', 'PizzaController')->only([
        'index', 'show'
    ]);

    Route::resource('orders', 'OrderController')->only([
        'show', 'store'
    ]);
});
