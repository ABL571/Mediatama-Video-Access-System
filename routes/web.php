<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AccessRequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

// ✅ Dashboard route (benar)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/', function () {
    return redirect()->route('videos.index');
});

Route::middleware(['auth'])->group(function () {
    // user management (admin)
    Route::resource('users', UserController::class)->except(['show']);

    // videos
    Route::resource('videos', VideoController::class)
        ->middleware(['auth'])
        ->except(['show']);

    Route::get('videos/{video}', [VideoController::class, 'show'])
        ->middleware(['auth', 'check.video.access'])
        ->name('videos.show');

    // access requests
    Route::get('/requests', [AccessRequestController::class, 'index'])->name('requests.index');
    Route::post('/requests', [AccessRequestController::class, 'store'])->name('requests.store');
    Route::post('/requests/{accessRequest}/approve', [AccessRequestController::class, 'approve'])->name('requests.approve');
    Route::post('/requests/{accessRequest}/revoke', [AccessRequestController::class, 'revoke'])->name('requests.revoke');
});

require __DIR__.'/auth.php';
