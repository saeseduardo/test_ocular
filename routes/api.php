<?php

use App\Http\Controllers\Api\V1\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::group(['middleware' => 'auth:api'], function () {
    });
});
