<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
// List all posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Show the form for creating a new post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Store a new post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Show the form for editing an existing post
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Update an existing post
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

// Delete an existing post
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
