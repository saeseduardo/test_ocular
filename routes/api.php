<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Category\CategoryController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('category', [CategoryController::class, 'create']);
        Route::delete('category/delete/{category}', [CategoryController::class, 'delete']);
    });
});
