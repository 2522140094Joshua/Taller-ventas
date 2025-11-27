<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LogService
{
    /**
     * Registrar cualquier evento del sistema
     *
     * @param string $evento
     * @param array $datos
     * @param string $nivel
     * @return void
     */
    public static function logEvent($evento, $datos = [], $nivel = 'info')
    {
        $logData = [
            'evento' => $evento,
            'fecha' => Carbon::now()->format('Y-m-d'),
            'hora' => Carbon::now()->format('H:i:s'),
            'timestamp' => Carbon::now()->toISOString(),
            'datos' => $datos,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'usuario_actual' => Auth::check() ? Auth::user()->name : 'Sistema'
        ];

        // Log en el archivo de Laravel
        Log::channel('registros')->$nivel("Evento: {$evento}", $logData);

        // También escribir en un archivo específico para registros
        self::writeToCustomLogFile($logData);
    }

    /**
     * Registrar un nuevo usuario en el sistema de logs
     *
     * @param array $userData
     * @param string $ip
     * @return void
     */
    public static function logUserRegistration($userData, $ip = null)
    {
        $datos = [
            'usuario' => [
                'nombre' => $userData['name'] ?? 'N/A',
                'email' => $userData['email'] ?? 'N/A',
                'rol' => $userData['rol'] ?? 'cliente'
            ],
            'ip' => $ip ?? request()->ip()
        ];

        self::logEvent('REGISTRO_USUARIO', $datos);
    }

    /**
     * Escribir en un archivo de log personalizado
     *
     * @param array $logData
     * @return void
     */
    private static function writeToCustomLogFile($logData)
    {
        $logFile = storage_path('logs/registros_usuarios.log');
        
        // Formato básico para eventos de registro de usuario
        if ($logData['evento'] === 'REGISTRO_USUARIO' && isset($logData['datos']['usuario'])) {
            $logEntry = sprintf(
                "[%s] REGISTRO_USUARIO - Fecha: %s, Hora: %s, Usuario: %s, Email: %s, Rol: %s, IP: %s\n",
                $logData['timestamp'],
                $logData['fecha'],
                $logData['hora'],
                $logData['datos']['usuario']['nombre'],
                $logData['datos']['usuario']['email'],
                $logData['datos']['usuario']['rol'],
                $logData['datos']['ip'] ?? $logData['ip']
            );
        } else {
            // Formato genérico para otros eventos
            $datosStr = json_encode($logData['datos'], JSON_UNESCAPED_UNICODE);
            $logEntry = sprintf(
                "[%s] %s - Fecha: %s, Hora: %s, Usuario: %s, IP: %s, Datos: %s\n",
                $logData['timestamp'],
                $logData['evento'],
                $logData['fecha'],
                $logData['hora'],
                $logData['usuario_actual'],
                $logData['ip'],
                $datosStr
            );
        }

        file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }

    /**
     * Obtener todos los registros del archivo de log
     *
     * @return array
     */
    public static function getRegistrationLogs()
    {
        $logFile = storage_path('logs/registros_usuarios.log');
        
        if (!file_exists($logFile)) {
            return [];
        }

        $logs = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $parsedLogs = [];

        foreach ($logs as $log) {
            // Parsear eventos de registro de usuario
            if (preg_match('/\[(.*?)\] REGISTRO_USUARIO - Fecha: (.*?), Hora: (.*?), Usuario: (.*?), Email: (.*?), Rol: (.*?), IP: (.*?)$/', $log, $matches)) {
                $parsedLogs[] = [
                    'timestamp' => $matches[1],
                    'fecha' => $matches[2],
                    'hora' => $matches[3],
                    'evento' => 'REGISTRO_USUARIO',
                    'usuario' => $matches[4],
                    'email' => $matches[5],
                    'rol' => $matches[6],
                    'ip' => $matches[7],
                    'tipo' => 'registro'
                ];
            }
            // Parsear otros eventos del sistema
            elseif (preg_match('/\[(.*?)\] (.*?) - Fecha: (.*?), Hora: (.*?), Usuario: (.*?), IP: (.*?), Datos: (.*?)$/', $log, $matches)) {
                $parsedLogs[] = [
                    'timestamp' => $matches[1],
                    'fecha' => $matches[3],
                    'hora' => $matches[4],
                    'evento' => $matches[2],
                    'usuario' => $matches[5],
                    'ip' => $matches[6],
                    'datos' => json_decode($matches[7], true),
                    'tipo' => 'evento'
                ];
            }
        }

        return array_reverse($parsedLogs); // Más recientes primero
    }

    /**
     * Registrar inicio de sesión
     *
     * @param array $userData
     * @return void
     */
    public static function logLogin($userData)
    {
        $datos = [
            'usuario' => [
                'nombre' => $userData['name'] ?? 'N/A',
                'email' => $userData['email'] ?? 'N/A',
                'rol' => $userData['rol'] ?? 'N/A'
            ]
        ];

        self::logEvent('INICIO_SESION', $datos);
    }

    /**
     * Registrar cierre de sesión
     *
     * @param array $userData
     * @return void
     */
    public static function logLogout($userData)
    {
        $datos = [
            'usuario' => [
                'nombre' => $userData['name'] ?? 'N/A',
                'email' => $userData['email'] ?? 'N/A',
                'rol' => $userData['rol'] ?? 'N/A'
            ]
        ];

        self::logEvent('CIERRE_SESION', $datos);
    }

    /**
     * Registrar creación de membresía
     *
     * @param array $membresiaData
     * @return void
     */
    public static function logMembresiaCreated($membresiaData)
    {
        $datos = [
            'membresia' => [
                'nombre' => $membresiaData['nombre'] ?? 'N/A',
                'precio' => $membresiaData['precio'] ?? 'N/A',
                'duracion' => $membresiaData['duracion'] ?? 'N/A'
            ]
        ];

        self::logEvent('CREAR_MEMBRESIA', $datos);
    }

    /**
     * Registrar creación de clase
     *
     * @param array $claseData
     * @return void
     */
    public static function logClaseCreated($claseData)
    {
        $datos = [
            'clase' => [
                'nombre' => $claseData['nombre'] ?? 'N/A',
                'instructor' => $claseData['instructor'] ?? 'N/A',
                'horario' => $claseData['horario'] ?? 'N/A'
            ]
        ];

        self::logEvent('CREAR_CLASE', $datos);
    }

    /**
     * Registrar eliminación de registro
     *
     * @param string $tipo
     * @param array $datos
     * @return void
     */
    public static function logDelete($tipo, $datos)
    {
        self::logEvent("ELIMINAR_{$tipo}", $datos, 'warning');
    }

    /**
     * Registrar error del sistema
     *
     * @param string $mensaje
     * @param array $datos
     * @return void
     */
    public static function logError($mensaje, $datos = [])
    {
        $datos['mensaje'] = $mensaje;
        self::logEvent('ERROR_SISTEMA', $datos, 'error');
    }

    /**
     * Registrar actividad del administrador
     *
     * @param string $accion
     * @param array $datos
     * @return void
     */
    public static function logAdminAction($accion, $datos = [])
    {
        $datos['accion'] = $accion;
        self::logEvent('ACCION_ADMIN', $datos);
    }
} 