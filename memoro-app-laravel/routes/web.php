<?php

use App\Http\Controllers\MemoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('memories.index');
})->middleware('auth');


// Products routes
Route::resource('products', ProductController::class)->middleware('auth');
Route::put('/products/{product}/consume', [ProductController::class, 'consume'])->name('products.consume');

Route::resource('memories', MemoryController::class)->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');

Route::controller(UserController::class)->group(function () {
    Route::get('/users/{user}/changepassword', 'getUpdatePasswordPage')->name('users.password.edit');
    Route::put('/users/{user}/changepassword', 'updatePassword')->name('users.password.update');

    Route::get('/users/{user}/settings', 'settings')->name('users.settings');
    Route::put('/users/{user}/deactivate', 'deactivate')->name('users.deactivate');
});
