<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/login', function () {
    return view('login');
})->name('login');

// Rutas que solo pueden ser accedidas por usuarios con priority != 0
Route::group(['middleware' => 'check.priority'], function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
});

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');