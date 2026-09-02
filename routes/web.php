<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetLogController;

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/', [DashboardController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Assets (CRUD)
|--------------------------------------------------------------------------
*/
Route::get('/assets', [AssetController::class, 'index']);
Route::post('/assets', [AssetController::class, 'store']);
Route::delete('/assets/{id}', [AssetController::class, 'destroy']);
Route::get('/assets/{id}', [AssetController::class, 'show']);

/*
|--------------------------------------------------------------------------
| Scan System
|--------------------------------------------------------------------------
*/
Route::get('/scan', function () {
    return view('scan');
});

Route::get('/scan/{kode}', [AssetController::class, 'scan']);

/*
|--------------------------------------------------------------------------
| Logs
|--------------------------------------------------------------------------
*/
Route::get('/logs', [AssetLogController::class, 'index']);