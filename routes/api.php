<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group(['prefix' => 'v1'], static function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);

        // Accounts
        Route::get('/accounts', [AccountController::class, 'index']);
        Route::post('/account', [AccountController::class, 'store']);

        // Transaction
        Route::post('/transaction', [TransactionController::class, 'transfer']);
    });
});
