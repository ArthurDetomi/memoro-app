<?php

use App\Http\Controllers\MemoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('memories.index');
})->middleware('auth');


// Products routes
Route::resource('products', ProductController::class)->middleware('auth');
Route::put('/products/{product}/consume', [ProductController::class, 'consume'])->name('products.consume');

Route::resource('memories', MemoryController::class)->middleware('auth');
