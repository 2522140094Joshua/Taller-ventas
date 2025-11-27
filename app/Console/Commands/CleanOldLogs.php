<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class CleanOldLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:clean {--days=30}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpiar logs antiguos del sistema de registros';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $days = (int) $this->option('days');
        $cutoffDate = Carbon::now()->subDays($days);
        
        $this->info("Limpiando logs más antiguos que {$days} días...");
        $this->info("Fecha de corte: " . $cutoffDate->format('Y-m-d H:i:s'));

        $logFile = storage_path('logs/registros_usuarios.log');
        
        if (!file_exists($logFile)) {
            $this->warn("No se encontró el archivo de logs.");
            return 0;
        }

        $logs = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $keptLogs = [];
        $removedCount = 0;

        foreach ($logs as $log) {
            if (preg_match('/\[(.*?)\] REGISTRO_USUARIO/', $log, $matches)) {
                $timestamp = $matches[1];
                $logDate = Carbon::parse($timestamp);
                
                if ($logDate->gte($cutoffDate)) {
                    $keptLogs[] = $log;
                } else {
                    $removedCount++;
                }
            } else {
                // Mantener logs que no coinciden con el patrón (por seguridad)
                $keptLogs[] = $log;
            }
        }

        // Reescribir el archivo con solo los logs recientes
        file_put_contents($logFile, implode("\n", $keptLogs) . "\n");

        $this->info("✓ Logs limpiados exitosamente!");
        $this->info("Logs eliminados: {$removedCount}");
        $this->info("Logs mantenidos: " . count($keptLogs));

        return 0;
    }
} 