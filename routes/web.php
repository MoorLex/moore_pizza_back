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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/doc', function () {
    return view('redoc');
});

Route::get('apidoc/main.json', function () {
    $openapi = OpenApi\scan([
        '../app/Http/Controllers/Api',
        '../app/Http/Requests',
        '../app/Http/Transformers',
    ]);
    header('Content-Type: application/json');
    echo $openapi->toJson();
});
