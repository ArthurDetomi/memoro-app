<?php

use App\Http\Controllers\ImageMemoryController;
use App\Http\Controllers\MemoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFeatureController;
use App\Http\Controllers\ProductMemoryController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/productfeature/settings', [ProductFeatureController::class, 'index'])->name('productsfeature.index')->middleware('auth');

Route::get('/reviews/settings', [ReviewController::class, 'index'])->name('review.index')->middleware('auth');

Route::get('/', [MemoryController::class, 'index'])->middleware('auth');


// Products routes
Route::resource('products', ProductController::class)->middleware('auth');
Route::put('/products/{product}/consume', [ProductController::class, 'consume'])->name('products.consume')->middleware('auth');

Route::get('/products/{product}/review', [ProductReviewController::class, 'index'])->name('products.review')->middleware('auth');
Route::post('/products/{product}/review', [ProductReviewController::class, 'store'])->name('products.review.store')->middleware('auth');


Route::delete('/imageMemories/{imageMemory}', [ImageMemoryController::class, 'destroy'])->name('imageMemories.destroy');
Route::post('/memories/{memory}/images', [ImageMemoryController::class, 'store'])->name('imageMemories.store');

Route::post('/memories/{memory}/products', [ProductMemoryController::class, 'store'])->name('productMemories.store');
Route::delete('/memories/{memory}/products/{product}', [ProductMemoryController::class, 'destroy'])->name('productMemories.destroy');


Route::resource('memories', MemoryController::class)->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');

Route::controller(UserController::class)->group(function () {
    Route::get('/users/{user}/changepassword', 'getUpdatePasswordPage')->name('users.password.edit');
    Route::put('/users/{user}/changepassword', 'updatePassword')->name('users.password.update');

    Route::get('/users/{user}/settings', 'settings')->name('users.settings');
    Route::put('/users/{user}/deactivate', 'deactivate')->name('users.deactivate');
})->middleware('auth');
