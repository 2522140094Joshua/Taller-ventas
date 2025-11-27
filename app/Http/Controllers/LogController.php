<?php

namespace App\Http\Controllers;

use App\Services\LogService;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Mostrar la vista con los logs de registros
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $logs = LogService::getRegistrationLogs();
        
        return view('logs.index', compact('logs'));
    }

    /**
     * Descargar el archivo de logs
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download()
    {
        $logFile = storage_path('logs/registros_usuarios.log');
        
        if (!file_exists($logFile)) {
            return redirect()->back()->with('error', 'No hay archivo de logs disponible.');
        }

        return response()->download($logFile, 'registros_usuarios_' . date('Y-m-d') . '.log');
    }

    /**
     * Limpiar el archivo de logs
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        $logFile = storage_path('logs/registros_usuarios.log');
        
        if (file_exists($logFile)) {
            unlink($logFile);
        }

        return redirect()->route('logs.index')->with('success', 'Archivo de logs limpiado correctamente.');
    }
} 