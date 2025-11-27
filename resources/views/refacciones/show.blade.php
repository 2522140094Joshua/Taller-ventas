@extends('layouts.app')

@section('title', 'Detalle de Refacción')

@section('header', 'Detalle de Refacción')

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

    .refaccion-header {
        text-align: center;
        padding-bottom: 30px;
        border-bottom: 2px solid #ecf0f1;
        margin-bottom: 30px;
    }

    .refaccion-icon {
        font-size: 5em;
        margin-bottom: 20px;
    }

    .refaccion-nombre {
        font-size: 2em;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .refaccion-codigo {
        font-size: 1.1em;
        color: #7f8c8d;
        margin-bottom: 10px;
    }

    .refaccion-categoria {
        background-color: #34495e;
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 0.9em;
        display: inline-block;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 30px;
    }

    .detail-card {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #3498db;
    }

    .detail-label {
        font-weight: bold;
        color: #7f8c8d;
        font-size: 0.9em;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .detail-value {
        font-size: 1.3em;
        color: #2c3e50;
    }

    .detail-value.price {
        color: #e74c3c;
        font-size: 1.8em;
        font-weight: bold;
    }

    .detail-value.stock {
        font-size: 1.5em;
        font-weight: bold;
    }

    .stock-ok {
        color: #27ae60;
    }

    .stock-bajo {
        color: #e74c3c;
    }

    .detail-full {
        grid-column: 1 / -1;
    }

    .descripcion-box {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #3498db;
        margin-bottom: 30px;
    }

    .descripcion-box .detail-label {
        margin-bottom: 15px;
    }

    .descripcion-text {
        font-size: 1.1em;
        line-height: 1.8;
        color: #555;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
        padding-top: 30px;
        border-top: 2px solid #ecf0f1;
    }

    .stats-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .stats-card .detail-label {
        color: rgba(255,255,255,0.8);
    }

    .stats-card .detail-value {
        color: white;
    }

    .alert-box {
        background: #fff3cd;
        border: 1px solid #ffc107;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-box.danger {
        background: #f8d7da;
        border-color: #dc3545;
    }

    @media (max-width: 768px) {
        .detail-grid {
            grid-template-columns: 1fr;
        }
        
        .action-buttons {
            flex-direction: column;
        }
    }
</style>
@endsection

@section('content')
<div class="detail-container">
    <!-- Header -->
    <div class="refaccion-header">
        <div class="refaccion-icon">{{ $refaccion->imagen }}</div>
        <h1 class="refaccion-nombre">{{ $refaccion->nombre }}</h1>
        <p class="refaccion-codigo">Código: {{ $refaccion->codigo }}</p>
        <span class="refaccion-categoria">{{ $refaccion->categoria }}</span>
    </div>

    <!-- Alerta de stock bajo -->
    @if($refaccion->stock_bajo)
    <div class="alert-box danger">
        <span style="font-size: 1.5em;">⚠️</span>
        <strong>¡Stock Bajo!</strong> El inventario está por debajo del nivel mínimo.
    </div>
    @endif

    <!-- Descripción -->
    <div class="descripcion-box">
        <div class="detail-label">📝 Descripción</div>
        <p class="descripcion-text">{{ $refaccion->descripcion }}</p>
    </div>

    <!-- Grid de detalles -->
    <div class="detail-grid">
        <!-- Marca -->
        <div class="detail-card">
            <div class="detail-label">🏷️ Marca</div>
            <div class="detail-value">{{ $refaccion->marca }}</div>
        </div>

        <!-- Proveedor -->
        <div class="detail-card">
            <div class="detail-label">📦 Proveedor</div>
            <div class="detail-value">{{ $refaccion->proveedor ?? 'No especificado' }}</div>
        </div>

        <!-- Precio de venta -->
        <div class="detail-card">
            <div class="detail-label">💰 Precio de Venta</div>
            <div class="detail-value price">${{ number_format($refaccion->precio, 2) }} MXN</div>
        </div>

        <!-- Precio de compra -->
        <div class="detail-card">
            <div class="detail-label">💵 Precio de Compra</div>
            <div class="detail-value">
                @if($refaccion->precio_compra)
                    ${{ number_format($refaccion->precio_compra, 2) }} MXN
                @else
                    No especificado
                @endif
            </div>
        </div>

        <!-- Stock actual -->
        <div class="detail-card stats-card">
            <div class="detail-label">📊 Stock Actual</div>
            <div class="detail-value stock">
                {{ $refaccion->stock }} unidades
            </div>
        </div>

        <!-- Stock mínimo -->
        <div class="detail-card">
            <div class="detail-label">📉 Stock Mínimo</div>
            <div class="detail-value {{ $refaccion->stock_bajo ? 'stock-bajo' : 'stock-ok' }}">
                {{ $refaccion->stock_minimo }} unidades
            </div>
        </div>

        <!-- Margen de ganancia -->
        @if($refaccion->precio_compra)
        <div class="detail-card detail-full">
            <div class="detail-label">📈 Margen de Ganancia</div>
            <div class="detail-value" style="color: #27ae60;">
                ${{ number_format($refaccion->precio - $refaccion->precio_compra, 2) }} MXN
                ({{ number_format((($refaccion->precio - $refaccion->precio_compra) / $refaccion->precio_compra) * 100, 2) }}%)
            </div>
        </div>
        @endif

        <!-- Fechas -->
        <div class="detail-card">
            <div class="detail-label">📅 Fecha de Registro</div>
            <div class="detail-value" style="font-size: 1em;">
                {{ $refaccion->created_at ? $refaccion->created_at->format('d/m/Y H:i') : 'No disponible' }}
            </div>
        </div>

        <div class="detail-card">
            <div class="detail-label">🔄 Última Actualización</div>
            <div class="detail-value" style="font-size: 1em;">
                {{ $refaccion->updated_at ? $refaccion->updated_at->format('d/m/Y H:i') : 'No disponible' }}
            </div>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="action-buttons">
        <a href="{{ route('refacciones.edit', $refaccion) }}" class="btn btn-warning">
            ✏️ Editar Refacción
        </a>
        <a href="{{ route('refacciones.index') }}" class="btn btn-primary">
            ← Volver al Catálogo
        </a>
        <form action="{{ route('refacciones.destroy', $refaccion) }}" method="POST" 
              onsubmit="return confirm('¿Estás seguro de eliminar esta refacción? Esta acción no se puede deshacer.')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                🗑️ Eliminar Refacción
            </button>
        </form>
    </div>
</div>
@endsection