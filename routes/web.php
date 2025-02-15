<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\registeredUserController;
use App\Http\Controllers\sessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

route::middleware('guest')->group(function () {
    Route::get('/register', [registeredUserController::class, 'create']);
    Route::post('/register', [registeredUserController::class, 'store']);

    Route::get('/login', [sessionController::class, 'create']);
    Route::post('/login', [sessionController::class, 'store']);
});

Route::post('/logout', [sessionController::class, 'destroy'])->middleware('auth');
