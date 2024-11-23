<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/posts', [PostController::class, 'indexAPI']);
    Route::post('/posts', [PostController::class, 'storeAPI']);
    Route::get('/posts/{post}', [PostController::class, 'showAPI']);
    Route::put('/posts/{post}', [PostController::class, 'updateAPI']);
    Route::delete('/posts/{post}', [PostController::class, 'destroyAPI']);
});
