@extends('layouts.app')

@section('title', 'Editar Refacción')

@section('header', 'Editar Refacción')

@section('styles')
<style>
    .form-container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        max-width: 800px;
        margin: 0 auto;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #2c3e50;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-control:focus {
        outline: none;
        border-color: #3498db;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 30px;
    }

    .error {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
    }

    .form-hint {
        font-size: 0.85em;
        color: #7f8c8d;
        margin-top: 5px;
    }

    .refaccion-preview {
        background: #ecf0f1;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
    }

    .refaccion-preview .icon {
        font-size: 3em;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="form-container">
    <div class="refaccion-preview">
        <div class="icon">{{ $refaccion->imagen }}</div>
        <h3>{{ $refaccion->nombre }}</h3>
        <p>Código: {{ $refaccion->codigo }}</p>
    </div>

    <form action="{{ route('refacciones.update', $refaccion) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-row">
            <div class="form-group">
                <label for="nombre">Nombre de la Refacción *</label>
                <input type="text" id="nombre" name="nombre" class="form-control"
                       value="{{ old('nombre', $refaccion->nombre) }}" required>
                @error('nombre')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="codigo">Código/SKU *</label>
                <input type="text" id="codigo" name="codigo" class="form-control"
                       value="{{ old('codigo', $refaccion->codigo) }}" required>
                <span class="form-hint">Código único de identificación</span>
                @error('codigo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="marca">Marca *</label>
                <input type="text" id="marca" name="marca" class="form-control"
                       value="{{ old('marca', $refaccion->marca) }}" required>
                @error('marca')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="categoria">Categoría *</label>
                <input type="text" id="categoria" name="categoria" class="form-control"
                       value="{{ old('categoria', $refaccion->categoria) }}" required>
                <span class="form-hint">Ej: Filtros, Frenos, Motor, etc.</span>
                @error('categoria')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción *</label>
            <textarea id="descripcion" name="descripcion" class="form-control"
                      required>{{ old('descripcion', $refaccion->descripcion) }}</textarea>
            @error('descripcion')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="precio">Precio de Venta (MXN) *</label>
                <input type="number" id="precio" name="precio" class="form-control"
                       step="0.01" min="0" value="{{ old('precio', $refaccion->precio) }}" required>
                @error('precio')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="precio_compra">Precio de Compra (MXN)</label>
                <input type="number" id="precio_compra" name="precio_compra" class="form-control"
                       step="0.01" min="0" value="{{ old('precio_compra', $refaccion->precio_compra) }}">
                <span class="form-hint">Opcional - Costo de adquisición</span>
                @error('precio_compra')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="stock">Stock Actual *</label>
                <input type="number" id="stock" name="stock" class="form-control"
                       min="0" value="{{ old('stock', $refaccion->stock) }}" required>
                @error('stock')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock_minimo">Stock Mínimo</label>
                <input type="number" id="stock_minimo" name="stock_minimo" class="form-control"
                       min="0" value="{{ old('stock_minimo', $refaccion->stock_minimo) }}">
                <span class="form-hint">Alerta cuando el stock sea menor o igual</span>
                @error('stock_minimo')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="imagen">Icono/Emoji</label>
                <input type="text" id="imagen" name="imagen" class="form-control"
                       maxlength="10" placeholder="🔧" value="{{ old('imagen', $refaccion->imagen) }}">
                <span class="form-hint">Emoji representativo (opcional)</span>
                @error('imagen')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="proveedor">Proveedor</label>
                <input type="text" id="proveedor" name="proveedor" class="form-control"
                       value="{{ old('proveedor', $refaccion->proveedor) }}">
                <span class="form-hint">Nombre del proveedor (opcional)</span>
                @error('proveedor')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">💾 Actualizar Refacción</button>
            <a href="{{ route('refacciones.show', $refaccion) }}" class="btn btn-primary">👁️ Ver Detalle</a>
            <a href="{{ route('refacciones.index') }}" class="btn btn-danger">❌ Cancelar</a>
        </div>
    </form>
</div>
@endsection