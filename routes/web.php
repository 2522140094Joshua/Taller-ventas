<?php

use App\Http\Controllers\MembresiaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\LogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\verificaRol;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RefaccionesController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\VentasController;


// Ruta pública de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('web');

// Rutas de autenticación
Auth::routes();

// Ruta de política de privacidad
Route::get('/avisoprivacidad', function () {
    return view('privacy-policy');
})->name('privacy-policy');

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Rutas de módulos principales
    Route::resource('servicios', ServiciosController::class);
    Route::resource('refacciones', RefaccionesController::class);
    Route::resource('vehiculos', VehiculosController::class);
    Route::resource('ventas', VentasController::class);
});