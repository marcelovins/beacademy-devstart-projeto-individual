<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoginAccessMiddleware;
use App\Http\Controllers\{
    LoginController,
    PostController,
    UserController,
    ViaCepController
};


Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/exit', [LoginController::class, 'exit'])->name('login.exit')->middleware('auth.access');

Route::middleware('auth.access')->group(function () {
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('users/{id}/posts', [PostController::class, 'show'])->name('posts.show');
});

Route::middleware('auth.access')->group(function () {
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});




