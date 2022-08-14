<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('forgot-password', [\App\Http\Controllers\API\AuthController::class, 'forgotPassword']);

Route::middleware(['auth.api'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [\App\Http\Controllers\API\ProfileController::class, 'profile']);
        Route::post('update', [\App\Http\Controllers\API\ProfileController::class, 'update']);
    });

    Route::prefix('paket')->group(function () {
        Route::get('latest', [\App\Http\Controllers\API\PaketController::class, 'latest']);
        Route::get('list', [\App\Http\Controllers\API\PaketController::class, 'list']);
        Route::post('create', [\App\Http\Controllers\API\PaketController::class, 'create']);
        Route::get('find/{id}', [\App\Http\Controllers\API\PaketController::class, 'find']);
        Route::post('update/{id}', [\App\Http\Controllers\API\PaketController::class, 'update']);
        Route::get('set-cancel/{id}', [\App\Http\Controllers\API\PaketController::class, 'setCancel']);
    });

    Route::prefix('notifikasi')->group(function () {
        Route::get('list', [\App\Http\Controllers\API\NotifikasiController::class, 'list']);
    });

    Route::prefix('pengaturan')->group(function () {
        Route::get('list', [\App\Http\Controllers\API\PengaturanController::class, 'list']);
    });
});
