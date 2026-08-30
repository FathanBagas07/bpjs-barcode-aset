<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetLogController;

Route::get('/', [DashboardController::class, 'index']);
Route::post('/assets', [AssetController::class, 'store']);
Route::get('/scan/{kode}', [AssetController::class, 'scan']);
Route::get('/scan-page', function() {
    return view('scan');
});
Route::delete('/assets/{id}', [AssetController::class, 'destroy']);
Route::get('/scan', function() {
    return view('scan');
});
Route::get('/assets/{id}', function($id) {
    $asset = \App\Models\Asset::findOrFail($id);
    return view('assets.show', compact('asset'));
});
Route::get('/logs', [AssetLogController::class, 'index']);
Route::get('/assets', [AssetController::class, 'index']);