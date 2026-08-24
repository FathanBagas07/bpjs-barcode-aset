<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;

Route::get('/', [AssetController::class, 'index']);
Route::post('/assets', [AssetController::class, 'store']);
Route::get('/scan/{kode}', [AssetController::class, 'scan']);
Route::get('/scan-page', function() {
    return view('scan');
});
Route::delete('/assets/{id}', [AssetController::class, 'destroy']);
