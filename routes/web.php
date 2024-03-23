<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::singleton('password', ProfilePasswordController::class)->only(['edit', 'update']);
    });

    Route::get('/delete', [ProfileController::class, 'delete'])->name('profile.delete');
    Route::singleton('profile', ProfileController::class)->destroyable();
});

require __DIR__.'/auth.php';
