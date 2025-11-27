<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\LogService;
use Illuminate\Support\Facades\Auth;

class LogAuthentication
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

        // Registrar inicio de sesión exitoso
        if ($request->is('login') && $request->isMethod('POST') && Auth::check()) {
            $user = Auth::user();
            LogService::logLogin([
                'name' => $user->name,
                'email' => $user->email,
                'rol' => $user->rol
            ]);
        }

        // Registrar cierre de sesión
        if ($request->is('logout') && $request->isMethod('POST')) {
            if (Auth::check()) {
                $user = Auth::user();
                LogService::logLogout([
                    'name' => $user->name,
                    'email' => $user->email,
                    'rol' => $user->rol
                ]);
            }
        }

        return $response;
    }
} 