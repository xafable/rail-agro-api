<?php

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

Route::controller(\App\Http\Controllers\ServicesController::class)
    ->prefix('/services')
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'get');
    });

Route::controller(\App\Http\Controllers\MessageController::class)
    ->prefix('/messages')
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'get');
        Route::post('/','store');
    });

Route::controller(\App\Http\Controllers\InformationController::class)
    ->prefix('/information')
    ->group(function () {
        Route::get('/', 'index');
    });

Route::controller(\App\Http\Controllers\ImageController::class)
    ->prefix('/images')
    ->group(function () {

        Route::post('/','store');
    });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
