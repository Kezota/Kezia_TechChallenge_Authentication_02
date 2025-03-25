<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// COMMENT: Load Passport routes
require __DIR__ . '/passport.php';

// COMMENT: These are custom routes for Passport auth, for login and register
Route::middleware('guest')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('api.register');
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');
});

// COMMENT: This is the middleware, so it requires authentication to access this route
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
