@extends('layouts.app')

@section('title', 'Servicios')
@section('header', 'Servicios')

@section('styles')
<style>
    .services-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .service-card {
        background: white;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        border-left: 5px solid #e74c3c;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .service-title {
        color: #2c3e50;
        font-size: 1.4em;
        margin-bottom: 15px;
        font-weight: bold;
    }

    .service-description {
        color: #7f8c8d;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .service-price {
        color: #27ae60;
        font-size: 1.3em;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .service-actions {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .icon {
        font-size: 2em;
        margin-bottom: 15px;
    }

    .top-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<div class="top-actions">
    <h2>Lista de Servicios</h2>
    <a href="{{ route('servicios.create') }}" class="btn btn-success">+ Agregar Servicio</a>
</div>

<div class="services-container">
    @forelse($servicios as $servicio)
        <div class="service-card">
            <div class="icon">{{ $servicio->icono ?? '🔧' }}</div>
            <h3 class="service-title">{{ $servicio->nombre }}</h3>
            <p class="service-description">{{ Str::limit($servicio->descripcion, 150) }}</p>
            <p class="service-price">${{ number_format($servicio->precio, 2) }}</p>
            
            <div class="service-actions">
                <a href="{{ route('servicios.show', $servicio->id) }}" class="btn btn-primary">Ver Detalles</a>
                <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    @empty
        <div style="grid-column: 1/-1; text-align: center; padding: 40px;">
            <p style="font-size: 1.2em; color: #7f8c8d;">No hay servicios registrados</p>
            <a href="{{ route('servicios.create') }}" class="btn btn-success" style="margin-top: 20px;">Crear Primer Servicio</a>
        </div>
    @endforelse
</div>
@endsection