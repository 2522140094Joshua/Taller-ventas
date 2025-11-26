<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiciosController;

Route::get('/', function () {
    return view('home'); 
});

Route::resource('servicios', ServiciosController::class);