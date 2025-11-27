@extends('layouts.app')

@section('title', 'Detalle del Servicio')
@section('header', 'Detalle del Servicio')

@section('styles')
<style>
    .detail-container {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        max-width: 900px;
        margin: 0 auto;
    }

    .service-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #ecf0f1;
    }

    .service-icon {
        font-size: 4em;
    }

    .service-info h2 {
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .service-price {
        color: #27ae60;
        font-size: 2em;
        font-weight: bold;
    }

    .detail-section {
        margin-bottom: 30px;
    }

    .detail-section h3 {
        color: #2c3e50;
        margin-bottom: 15px;
        font-size: 1.3em;
    }

    .detail-section p {
        color: #7f8c8d;
        line-height: 1.8;
        font-size: 1.1em;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .info-item {
        background: #ecf0f1;
        padding: 15px;
        border-radius: 5px;
    }

    .info-label {
        font-weight: bold;
        color: #2c3e50;
        margin-bottom: 5px;
    }

    .info-value {
        color: #7f8c8d;
        font-size: 1.1em;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }

    .btn-delete {
        background-color: #e74c3c;
        color: white;
    }
</style>
@endsection

@section('content')
<div class="detail-container">
    <div class="service-header">
        <div class="service-icon">{{ $servicio->icono ?? '🔧' }}</div>
        <div class="service-info">
            <h2>{{ $servicio->nombre }}</h2>
            <p class="service-price">${{ number_format($servicio->precio, 2) }} MXN</p>
        </div>
    </div>

    <div class="detail-section">
        <h3>Descripción</h3>
        <p>{{ $servicio->descripcion }}</p>
    </div>

    <div class="info-grid">
        <div class="info-item">
            <div class="info-label">Tiempo Estimado</div>
            <div class="info-value">
                {{ $servicio->tiempo_estimado ? $servicio->tiempo_estimado . ' minutos' : 'No especificado' }}
            </div>
        </div>

        <div class="info-item">
            <div class="info-label">Fecha de Creación</div>
            <div class="info-value">{{ $servicio->created_at->format('d/m/Y') }}</div>
        </div>

        <div class="info-item">
            <div class="info-label">Última Actualización</div>
            <div class="info-value">{{ $servicio->updated_at->format('d/m/Y H:i') }}</div>
        </div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('servicios.index') }}" class="btn btn-primary">Volver al Listado</a>
        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-success">Editar Servicio</a>
        <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" 
              onsubmit="return confirm('¿Estás seguro de eliminar este servicio?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">Eliminar</button>
        </form>
    </div>
</div>
@endsection