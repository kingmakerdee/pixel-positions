<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\registeredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth');

Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

route::middleware('guest')->group(function () {
    Route::get('/register', [registeredUserController::class, 'create']);
    Route::post('/register', [registeredUserController::class, 'store']);

    Route::get('/login', [sessionController::class, 'create']);
    Route::post('/login', [sessionController::class, 'store']);
});

Route::post('/logout', [sessionController::class, 'destroy'])->middleware('auth');
