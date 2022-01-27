<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Category\CategoryController;
use App\Http\Controllers\Api\V1\Post\LikeController;
use App\Http\Controllers\Api\V1\Post\PostController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('category', [CategoryController::class, 'create']);
        Route::get('category', [CategoryController::class, 'list']);
        Route::delete('category/delete/{category}', [CategoryController::class, 'delete']);

        Route::post('post', [PostController::class, 'create']);
        Route::get('posts', [PostController::class, 'list']);
        Route::put('post/update/{post}', [PostController::class, 'update']);
        Route::delete('post/delete/{post}', [PostController::class, 'delete']);

        Route::get('like/post/{post}', [LikeController::class, 'add']);
    });
});
