@extends('layouts.app')

@section('title', 'Registros de Usuarios')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-file-alt mr-2"></i>
                        Registros de Usuarios
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('logs.download') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-download mr-1"></i>
                            Descargar Log
                        </a>
                        <a href="{{ route('logs.clear') }}" class="btn btn-danger btn-sm" 
                           onclick="return confirm('¿Estás seguro de que quieres limpiar el archivo de logs?')">
                            <i class="fas fa-trash mr-1"></i>
                            Limpiar Log
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> ¡Éxito!</h5>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> ¡Error!</h5>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(count($logs) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Evento</th>
                                        <th>Usuario</th>
                                        <th>IP</th>
                                        <th>Detalles</th>
                                        <th>Timestamp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($logs as $index => $log)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ $log['fecha'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-secondary">
                                                    {{ $log['hora'] }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($log['evento'] == 'REGISTRO_USUARIO')
                                                    <span class="badge badge-success">Registro Usuario</span>
                                                @elseif($log['evento'] == 'INICIO_SESION')
                                                    <span class="badge badge-primary">Inicio Sesión</span>
                                                @elseif($log['evento'] == 'CIERRE_SESION')
                                                    <span class="badge badge-secondary">Cierre Sesión</span>
                                                @elseif($log['evento'] == 'CREAR_MEMBRESIA')
                                                    <span class="badge badge-info">Crear Membresía</span>
                                                @elseif($log['evento'] == 'CREAR_CLASE')
                                                    <span class="badge badge-warning">Crear Clase</span>
                                                @elseif(strpos($log['evento'], 'ELIMINAR_') === 0)
                                                    <span class="badge badge-danger">Eliminar</span>
                                                @elseif($log['evento'] == 'ERROR_SISTEMA')
                                                    <span class="badge badge-danger">Error</span>
                                                @elseif($log['evento'] == 'ACCION_ADMIN')
                                                    <span class="badge badge-dark">Admin</span>
                                                @else
                                                    <span class="badge badge-light">{{ $log['evento'] }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ $log['usuario'] }}</strong>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $log['ip'] }}</small>
                                            </td>
                                            <td>
                                                @if(isset($log['email']))
                                                    <small class="text-primary">{{ $log['email'] }}</small>
                                                    @if(isset($log['rol']))
                                                        <br>
                                                        @if($log['rol'] == 'admin')
                                                            <span class="badge badge-danger badge-sm">Admin</span>
                                                        @elseif($log['rol'] == 'instructor')
                                                            <span class="badge badge-warning badge-sm">Instructor</span>
                                                        @else
                                                            <span class="badge badge-success badge-sm">Cliente</span>
                                                        @endif
                                                    @endif
                                                @elseif(isset($log['datos']))
                                                    <small class="text-muted">
                                                        @if(is_array($log['datos']))
                                                            {{ json_encode($log['datos'], JSON_UNESCAPED_UNICODE) }}
                                                        @else
                                                            {{ $log['datos'] }}
                                                        @endif
                                                    </small>
                                                @else
                                                    <small class="text-muted">-</small>
                                                @endif
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $log['timestamp'] }}</small>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-3">
                            <p class="text-muted">
                                <i class="fas fa-info-circle mr-1"></i>
                                Total de registros: <strong>{{ count($logs) }}</strong>
                            </p>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No hay registros disponibles</h5>
                            <p class="text-muted">Los registros aparecerán aquí cuando los usuarios se registren en la plataforma.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    // Auto-refresh cada 30 segundos
    setInterval(function() {
        location.reload();
    }, 30000);
});
</script>
@endsection 