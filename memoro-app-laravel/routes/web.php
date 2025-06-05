<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ImageMemoryController;
use App\Http\Controllers\MemoryController;
use App\Http\Controllers\MemoryLikeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFeatureController;
use App\Http\Controllers\ProductMemoryController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/reviews/settings', [ReviewController::class, 'index'])->name('reviews.index')->middleware('auth');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');
Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy')->middleware('auth');

Route::resource('features', FeatureController::class)->middleware('auth');

Route::get('/', [MemoryController::class, 'index'])->middleware('auth');

// Like memories
Route::post('memories/{memory}/like', [MemoryLikeController::class, 'like'])->middleware('auth')->name('memories.like');
Route::post('memories/{memory}/unlike', [MemoryLikeController::class, 'unlike'])->middleware('auth')->name('memories.unlike');

// Products routes
Route::resource('products', ProductController::class)->middleware('auth');
Route::put('/products/{product}/consume', [ProductController::class, 'consume'])->name('products.consume')->middleware('auth');

Route::get('/products/{product}/review', [ProductReviewController::class, 'index'])->name('products.review')->middleware('auth');
Route::post('/products/{product}/review', [ProductReviewController::class, 'store'])->name('products.review.store')->middleware('auth');

// Cadastro de produtos com duas etapas
Route::get('/products/create/select-type', [ProductController::class, 'selectType'])->name('products.select_type')->middleware('auth');
Route::get('/products/type/{productType}/create', [ProductController::class, 'createWithType'])->name('products.create_with_type');

Route::delete('/imageMemories/{imageMemory}', [ImageMemoryController::class, 'destroy'])->name('imageMemories.destroy');
Route::post('/memories/{memory}/images', [ImageMemoryController::class, 'store'])->name('imageMemories.store');

Route::post('/memories/{memory}/products', [ProductMemoryController::class, 'store'])->name('productMemories.store');
Route::delete('/memories/{memory}/products/{product}', [ProductMemoryController::class, 'destroy'])->name('productMemories.destroy');


Route::resource('memories', MemoryController::class)->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');

// Follows routes
Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');

Route::controller(UserController::class)->group(function () {
    Route::get('/users/{user}/changepassword', 'getUpdatePasswordPage')->name('users.password.edit');
    Route::put('/users/{user}/changepassword', 'updatePassword')->name('users.password.update');

    Route::get('/users/{user}/settings', 'settings')->name('users.settings');
    Route::put('/users/{user}/deactivate', 'deactivate')->name('users.deactivate');
})->middleware('auth');


Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Comment route
Route::resource('memories.comments', CommentController::class)->only(['store'])->middleware('auth');

// Feed route
Route::get('/feed', FeedController::class)->middleware('auth')->name(name: 'feed');
