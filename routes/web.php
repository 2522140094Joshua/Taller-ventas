<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\RefaccionesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('servicios', ServiciosController::class);
Route::resource('refacciones', RefaccionesController::class);