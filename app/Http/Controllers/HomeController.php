<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Debug: Verificar roles de usuarios
        $usuarios = User::all();
        Log::info('=== USUARIOS EN SISTEMA ===');
        foreach ($usuarios as $usuario) {
            Log::info('Usuario: ' . $usuario->name . ' - Email: ' . $usuario->email . ' - Rol: ' . $usuario->rol);
        }
        
        return view('home');
    }
}
