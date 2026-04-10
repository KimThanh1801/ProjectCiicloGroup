<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::post('/createPost', [PostController::class, 'createPost']);
// Route::middleware(['web'])->group(function () {
//     Route::post('/login', [AuthController::class, 'login']);
// });
Route::middleware(['web'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/createPost', [PostController::class, 'createPost']);
});
Route::post('/register', [AuthController::class, 'register']);
