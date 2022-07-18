<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LoginAccessMiddleware;
use App\Http\Controllers\{
    LoginController,
    PostController,
    UserController,
    ViaCepController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello-world', function () {
//     echo '<h1>hello world!</h1>';
// });

// Route::get('/users/{nome}', function ($nome) {
//     echo "<h1>$nome</h1>";
// });

// php artisan make:controller NomeDoController  (para criar controllers)

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



//Via Cep Web Service
// Route::get('/viacep', [ViaCepController::class, 'index'])->name('viacep.index');
// Route::post('/viacep', [ViaCepController::class, 'index'])->name('viacep.index.post');
// Route::get('/viacep/{cep}', [ViaCepController::class, 'show'])->name('viacep.show');

// fazer o model e já criar a migration
// php artisan make:model NomeModel -m


