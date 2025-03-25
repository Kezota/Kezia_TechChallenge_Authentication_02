<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

// COMMENT: The following routes are the views for the website
Route::get('/', [ViewController::class, 'viewHomepage'])->name('viewHomepage');

// COMMENT:     Only guests (not logged in users) can access these routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [ViewController::class, 'viewLoginPage'])->name('viewLoginPage');
    Route::get('/register', [ViewController::class, 'viewRegisterPage'])->name('viewRegisterPage');
});

// COMMENT: It requires authentication to access this route
Route::middleware('auth')->group(function () {
    Route::get('/user', [ViewController::class, 'viewUserPage'])->name('viewUserPage');
});
