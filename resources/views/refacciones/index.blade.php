@extends('layouts.app')

@section('title', 'Refacciones')

@section('header', 'Gestión de Refacciones')

@section('styles')
<style>
    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .refacciones-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
        margin-top: 20px;
    }

    .refaccion-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        border-left: 5px solid #3498db;
    }

    .refaccion-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }

    .refaccion-icon {
        font-size: 2.5em;
        margin-bottom: 10px;
    }

    .refaccion-categoria {
        background-color: #34495e;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8em;
        display: inline-block;
        margin-bottom: 10px;
    }

    .refaccion-nombre {
        color: #2c3e50;
        font-size: 1.3em;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .refaccion-codigo {
        color: #7f8c8d;
        font-size: 0.85em;
        margin-bottom: 5px;
    }

    .refaccion-marca {
        color: #555;
        font-size: 0.9em;
        margin-bottom: 10px;
    }

    .refaccion-descripcion {
        color: #666;
        line-height: 1.5;
        margin-bottom: 15px;
        font-size: 0.9em;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .refaccion-precio {
        color: #e74c3c;
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .refaccion-stock {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #ecf0f1;
        border-radius: 5px;
    }

    .stock-info {
        font-weight: bold;
    }

    .stock-ok {
        color: #27ae60;
    }

    .stock-bajo {
        color: #e74c3c;
    }

    .refaccion-actions {
        display: flex;
        gap: 10px;
    }

    .btn-small {
        padding: 8px 15px;
        font-size: 0.9em;
        flex: 1;
        text-align: center;
    }

    .btn-info {
        background-color: #3498db;
        color: white;
    }

    .btn-warning {
        background-color: #f39c12;
        color: white;
    }

    .btn-delete {
        background-color: #e74c3c;
        color: white;
        border: none;
        cursor: pointer;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .empty-state-icon {
        font-size: 4em;
        margin-bottom: 20px;
    }

    .proveedor-info {
        font-size: 0.85em;
        color: #7f8c8d;
        margin-top: 5px;
    }
</style>
@endsection

@section('content')
<div class="action-bar">
    <h2>Catálogo de Refacciones</h2>
    <a href="{{ route('refacciones.create') }}" class="btn btn-success">➕ Nueva Refacción</a>
</div>

@if($refacciones->count() > 0)
    <div class="refacciones-grid">
        @foreach($refacciones as $refaccion)
        <div class="refaccion-card">
            <div class="refaccion-icon">{{ $refaccion->imagen }}</div>
            <span class="refaccion-categoria">{{ $refaccion->categoria }}</span>
            
            <h3 class="refaccion-nombre">{{ $refaccion->nombre }}</h3>
            <p class="refaccion-codigo">Código: {{ $refaccion->codigo }}</p>
            <p class="refaccion-marca">🏷️ {{ $refaccion->marca }}</p>
            <p class="refaccion-descripcion">{{ $refaccion->descripcion }}</p>
            
            <div class="refaccion-precio">${{ number_format($refaccion->precio, 2) }} MXN</div>
            
            <div class="refaccion-stock">
                <span class="stock-info {{ $refaccion->stock_bajo ? 'stock-bajo' : 'stock-ok' }}">
                    {{ $refaccion->stock_bajo ? '⚠️' : '✅' }} Stock: {{ $refaccion->stock }} unidades
                </span>
            </div>

            @if($refaccion->proveedor)
                <p class="proveedor-info">📦 Proveedor: {{ $refaccion->proveedor }}</p>
            @endif
            
            <div class="refaccion-actions">
                <a href="{{ route('refacciones.show', $refaccion) }}" class="btn btn-info btn-small">👁️ Ver</a>
                <a href="{{ route('refacciones.edit', $refaccion) }}" class="btn btn-warning btn-small">✏️ Editar</a>
                <form action="{{ route('refacciones.destroy', $refaccion) }}" method="POST" style="flex: 1;" 
                      onsubmit="return confirm('¿Estás seguro de eliminar esta refacción?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete btn-small" style="width: 100%;">🗑️ Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <div class="empty-state-icon">📦</div>
        <h3>No hay refacciones registradas</h3>
        <p>Comienza agregando tu primera refacción al inventario</p>
        <a href="{{ route('refacciones.create') }}" class="btn btn-success" style="margin-top: 20px;">➕ Agregar Refacción</a>
    </div>
@endif
@endsection