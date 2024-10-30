<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['middleware' => 'guest:sanctum','prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::post('store', [ProductController::class, 'store']);

});


Route::group(['middleware' => 'guest:sanctum','prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:sanctum','prefix' => 'orders'], function () {
//    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('store', [OrderController::class, 'store']);
});
