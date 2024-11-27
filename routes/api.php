<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\RajaOngkirController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('berita', BeritaController::class);

// Public route for Login (no authentication required)
Route::post('login', [AuthController::class, 'login']);

// Protected routes for 'Berita' (only accessible by authenticated users)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('berita', [BeritaController::class, 'index']); // Get List of berita
    Route::get('berita/{id}', [BeritaController::class, 'show']); // Get specific berita
    Route::post('berita', [BeritaController::class, 'store']); // Create a new berita
    Route::put('berita/{id}', [BeritaController::class, 'update']); // Update a berita
    Route::delete('berita/{id}', [BeritaController::class, 'destroy']); // Delete a berita
});

Route::get('/rajaongkir/province', [RajaOngkirController::class, 'getProvinces']);
Route::get('/rajaongkir/city', [RajaOngkirController::class, 'getCities']);
Route::post('/rajaongkir/cost', [RajaOngkirController::class, 'getCost']);



