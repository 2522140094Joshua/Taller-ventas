<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\LogService;
use Carbon\Carbon;

class GenerateTestLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:generate-test {count=5}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generar logs de prueba para el sistema de registros';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = (int) $this->argument('count');
        
        $this->info("Generando {$count} logs de prueba...");

        $testUsers = [
            ['name' => 'Juan Pérez', 'email' => 'juan.perez@test.com', 'rol' => 'cliente'],
            ['name' => 'María García', 'email' => 'maria.garcia@test.com', 'rol' => 'cliente'],
            ['name' => 'Carlos López', 'email' => 'carlos.lopez@test.com', 'rol' => 'instructor'],
            ['name' => 'Ana Martínez', 'email' => 'ana.martinez@test.com', 'rol' => 'cliente'],
            ['name' => 'Luis Rodríguez', 'email' => 'luis.rodriguez@test.com', 'rol' => 'admin'],
        ];

        $testEvents = [
            ['evento' => 'INICIO_SESION', 'datos' => ['usuario' => ['nombre' => 'Admin', 'email' => 'admin@test.com', 'rol' => 'admin']]],
            ['evento' => 'CREAR_MEMBRESIA', 'datos' => ['membresia' => ['nombre' => 'Membresía Premium', 'precio' => '$100', 'duracion' => '30 días']]],
            ['evento' => 'CREAR_CLASE', 'datos' => ['clase' => ['nombre' => 'Yoga', 'instructor' => 'Carlos López', 'horario' => '10:00 AM']]],
            ['evento' => 'ELIMINAR_USUARIO', 'datos' => ['usuario_id' => 5, 'nombre' => 'Usuario Test', 'email' => 'test@test.com']],
            ['evento' => 'ACCION_ADMIN', 'datos' => ['accion' => 'Configuración del sistema', 'modulo' => 'Configuración']],
            ['evento' => 'ERROR_SISTEMA', 'datos' => ['mensaje' => 'Error de conexión a base de datos', 'codigo' => 'DB001']],
        ];

        for ($i = 0; $i < $count; $i++) {
            // Alternar entre registros de usuario y otros eventos
            if ($i % 2 == 0) {
                $userData = $testUsers[$i % count($testUsers)];
                $eventData = [
                    'evento' => 'REGISTRO_USUARIO',
                    'datos' => [
                        'usuario' => [
                            'nombre' => $userData['name'],
                            'email' => $userData['email'],
                            'rol' => $userData['rol']
                        ],
                        'ip' => '192.168.1.' . rand(1, 255)
                    ]
                ];
            } else {
                $eventData = $testEvents[$i % count($testEvents)];
            }
            
            // Simular diferentes fechas
            $randomDays = rand(0, 30);
            $randomHours = rand(0, 23);
            $randomMinutes = rand(0, 59);
            
            $date = Carbon::now()->subDays($randomDays)->subHours($randomHours)->subMinutes($randomMinutes);
            
            // Crear datos de log con fecha personalizada
            $logData = [
                'evento' => $eventData['evento'],
                'fecha' => $date->format('Y-m-d'),
                'hora' => $date->format('H:i:s'),
                'timestamp' => $date->toISOString(),
                'datos' => $eventData['datos'],
                'ip' => '192.168.1.' . rand(1, 255),
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'usuario_actual' => 'Sistema'
            ];

            // Escribir directamente en el archivo de log
            $logFile = storage_path('logs/registros_usuarios.log');
            
            if ($eventData['evento'] === 'REGISTRO_USUARIO') {
                $logEntry = sprintf(
                    "[%s] REGISTRO_USUARIO - Fecha: %s, Hora: %s, Usuario: %s, Email: %s, Rol: %s, IP: %s\n",
                    $logData['timestamp'],
                    $logData['fecha'],
                    $logData['hora'],
                    $logData['datos']['usuario']['nombre'],
                    $logData['datos']['usuario']['email'],
                    $logData['datos']['usuario']['rol'],
                    $logData['datos']['ip']
                );
            } else {
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
            
            $this->line("✓ Generado log para evento: {$eventData['evento']}");
        }

        $this->info("¡Logs de prueba generados exitosamente!");
        $this->info("Archivo de log: " . storage_path('logs/registros_usuarios.log'));

        return 0;
    }
} 