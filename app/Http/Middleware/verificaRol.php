<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class verificaRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $rol): Response
    {
        $userRol = Auth::user()->rol;
        $requestUrl = $request->url();
        
        // Debug: Log del usuario y URL
        Log::info('=== DEBUG MIDDLEWARE ===');
        Log::info('Usuario: ' . Auth::user()->name . ' - Rol: ' . $userRol);
        Log::info('URL: ' . $requestUrl);
        Log::info('Roles solicitados: ' . $rol);

        // Si es administrador, tiene acceso completo
        if ($userRol === 'administrador') {
            Log::info('✓ Acceso completo para administrador');
            return $next($request);
        }

        // Separa por coma y limpia espacios
        $rolesArray = array_map('trim', explode(',', $rol));

        // Verificar si el rol del usuario está en los roles permitidos
        if (in_array($userRol, $rolesArray)) {
            Log::info('✓ Acceso permitido para rol: ' . $userRol);
            return $next($request);
        }

        // Lógica específica para profesores
        if ($userRol === 'profesor') {
            // Profesores pueden acceder a clases y ver información de clientes
            if (str_contains($requestUrl, 'clases') || str_contains($requestUrl, 'usuarios')) {
                Log::info('✓ Acceso permitido para profesor a: ' . $requestUrl);
                return $next($request);
            }
        }

        // Lógica específica para clientes
        if ($userRol === 'cliente') {
            // Clientes solo pueden ver clases
            if (str_contains($requestUrl, 'clases')) {
                Log::info('✓ Acceso permitido para cliente a: ' . $requestUrl);
                return $next($request);
            }
        }

        Log::info('✗ Acceso denegado - redirigiendo a home');
        Log::info('Rol del usuario: ' . $userRol);
        Log::info('URL solicitada: ' . $requestUrl);
        return redirect()->route('home');
    }
}
