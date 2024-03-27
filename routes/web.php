<?php

use App\Http\Controllers\BoardsController;
use App\Http\Controllers\BoardTasksController;
use App\Http\Controllers\BoardTitleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePasswordController;
use App\Http\Controllers\TaskTitleController;
use App\Models\Board;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'boards' => Board::query()->get(),
        ]);
    })->name('dashboard');

    Route::resource('boards', BoardsController::class);
    Route::singleton('boards.title', BoardTitleController::class)->only(['show', 'edit', 'update']);
    Route::resource('boards.tasks', BoardTasksController::class);
    Route::singleton('tasks.title', TaskTitleController::class)->only(['show', 'edit', 'update']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::singleton('password', ProfilePasswordController::class)->only(['edit', 'update']);
    });

    Route::get('/delete', [ProfileController::class, 'delete'])->name('profile.delete');
    Route::singleton('profile', ProfileController::class)->destroyable();
});

require __DIR__.'/auth.php';
