<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store');
});
