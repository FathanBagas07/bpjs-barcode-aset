<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetLogController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    | Profile
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    | Assets
    */
    Route::get('/assets', [AssetController::class, 'index'])
    ->name('assets');
    Route::post('/assets', [AssetController::class, 'store']);
    Route::delete('/assets/{id}', [AssetController::class, 'destroy']);

    /*
    | Scan page
    */
    Route::get('/scan', function () {
        return view('scan');
    })->name('scan');

    /*
    | Logs
    */
    Route::get('/logs', [AssetLogController::class, 'index'])
    ->name('log');
});

require __DIR__.'/auth.php';
