<?php

use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/', function () {
    return redirect('login');
});

// BACKEND
Route::group(['middleware' => 'auth:web', 'prefix' => 'c-panel'], function () {
    Route::get('dashboard', [\App\Http\Controllers\Backend\DashboardController::class, 'dashboard'])->name('backend.dashboard');
    Route::get('logout', [\App\Http\Controllers\Backend\DashboardController::class, 'logout'])->name('backend.logout');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\DashboardController::class, 'indexProfile'])->name('backend.profile');
        Route::post('store', [\App\Http\Controllers\Backend\DashboardController::class, 'updateProfile'])->name('backend.profile.update');
    });

    Route::group(['prefix' => 'member'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\MemberController::class, 'index'])->name('backend.member');
        Route::get('create', [\App\Http\Controllers\Backend\MemberController::class, 'create'])->name('backend.member.create');
        Route::post('store', [\App\Http\Controllers\Backend\MemberController::class, 'store'])->name('backend.member.store');
        Route::get('edit/{id}', [\App\Http\Controllers\Backend\MemberController::class, 'edit'])->name('backend.member.edit');
        Route::post('update/{id}', [\App\Http\Controllers\Backend\MemberController::class, 'update'])->name('backend.member.update');
        Route::get('delete/{id}', [\App\Http\Controllers\Backend\MemberController::class, 'delete'])->name('backend.member.delete');
    });

    Route::group(['prefix' => 'paket'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\PaketController::class, 'index'])->name('backend.paket');
        Route::get('edit/{id}', [\App\Http\Controllers\Backend\PaketController::class, 'edit'])->name('backend.paket.edit');
        Route::post('update/{id}', [\App\Http\Controllers\Backend\PaketController::class, 'update'])->name('backend.paket.update');
    });
    
    Route::group(['prefix' => 'notifikasi'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\NotifikasiController::class, 'index'])->name('backend.notifikasi');
    });

    Route::group(['prefix' => 'pengaturan'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\PengaturanController::class, 'index'])->name('backend.pengaturan');
        Route::post('update', [\App\Http\Controllers\Backend\PengaturanController::class, 'update'])->name('backend.pengaturan.update');
    });
});
