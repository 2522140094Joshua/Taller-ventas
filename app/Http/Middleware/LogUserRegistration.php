<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\LogService;

class LogUserRegistration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Verificar si es una solicitud de registro exitosa
        if ($request->is('register') && $request->isMethod('POST') && $response->getStatusCode() === 302) {
            // Si la respuesta es una redirección (302), probablemente el registro fue exitoso
            $userData = $request->only(['name', 'email']);
            $userData['rol'] = 'cliente'; // Rol por defecto
            
            // Registrar en el log
            LogService::logUserRegistration($userData, $request->ip());
        }

        return $response;
    }
} 