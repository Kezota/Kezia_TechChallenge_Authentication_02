<?php

// COMMENT: Since I ignored the default Passport routes, so we need to manually register them
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\ApproveAuthorizationController;
use Laravel\Passport\Http\Controllers\DenyAuthorizationController;
use Laravel\Passport\Http\Controllers\TransientTokenController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\ScopeController;

// COMMENT: These are the default Passport routes
Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);
Route::get('/oauth/authorize', [AuthorizationController::class, 'authorize']);
Route::post('/oauth/authorize', [ApproveAuthorizationController::class, 'approve']);
Route::delete('/oauth/authorize', [DenyAuthorizationController::class, 'deny']);
Route::post('/oauth/token/refresh', [TransientTokenController::class, 'refresh']);
Route::post('/oauth/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
Route::get('/oauth/personal-access-tokens', [PersonalAccessTokenController::class, 'forUser']);
Route::delete('/oauth/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, 'destroy']);
Route::get('/oauth/clients', [ClientController::class, 'forUser']);
Route::post('/oauth/clients', [ClientController::class, 'store']);
Route::put('/oauth/clients/{client_id}', [ClientController::class, 'update']);
Route::delete('/oauth/clients/{client_id}', [ClientController::class, 'destroy']);
Route::get('/oauth/scopes', [ScopeController::class, 'all']);
