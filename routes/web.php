<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Quản lý danh mục
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    // Quản lý người dùng
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

// Các route dành cho Admin và Editor
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    // Tạo mới bài viết
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    // Chỉnh sửa bài viết
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
});

// Các route mà mọi người dùng đã đăng nhập đều có thể truy cập
Route::middleware(['auth'])->group(function () {
    // Xem danh sách bài viết
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    // Xóa bài viết
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
