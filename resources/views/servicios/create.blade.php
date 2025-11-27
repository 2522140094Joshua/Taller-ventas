@extends('layouts.app')

@section('title', 'Crear Servicio')
@section('header', 'Crear Nuevo Servicio')

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa, #ecf0f1);
    }

    .form-container {
        background: #ffffff;
        padding: 40px;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        max-width: 800px;
        margin: 40px auto;
        border-top: 6px solid #3498db;
        animation: fadeIn 0.6s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 14px;
        border: 1.5px solid #dcdfe3;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.25s ease;
        background-color: #fafafa;
    }

    .form-control:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.15);
        background-color: #fff;
    }

    textarea.form-control {
        min-height: 130px;
        resize: vertical;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 35px;
        justify-content: flex-end;
    }

    .btn {
        padding: 12px 22px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-success {
        background: linear-gradient(135deg, #2ecc71, #27ae60);
        color: white;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(39, 174, 96, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, #ff6b6b, #e74c3c);
        color: white;
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(231, 76, 60, 0.4);
    }

    .error {
        color: #e74c3c;
        font-size: 13px;
        margin-top: 6px;
        display: block;
        font-weight: 500;
    }

    .btn-custom-success {
        padding: 12px 22px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        color: white;
        background: linear-gradient(135deg, #2ecc71, #27ae60);
        transition: all 0.3s ease;
    }

    .btn-custom-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(39, 174, 96, 0.4);
    }

    .btn-custom-danger {
        padding: 12px 22px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        color: white;
        background: linear-gradient(135deg, #ff6b6b, #e74c3c);
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-custom-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(231, 76, 60, 0.4);
    }
</style>

@endsection

@section('content')
<div class="form-container">
    <form action="{{ route('servicios.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre del Servicio</label>
            <input type="text" id="nombre" name="nombre" class="form-control"
                value="{{ old('nombre') }}" required>
            @error('nombre')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control"
                required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio (MXN)</label>
            <input type="number" id="precio" name="precio" class="form-control"
                step="0.01" min="0" value="{{ old('precio') }}" required>
            @error('precio')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="tiempo_estimado">Tiempo Estimado (En minutos)</label>
            <input type="number" id="tiempo_estimado" name="tiempo_estimado"
                class="form-control" min="0" value="{{ old('tiempo_estimado') }}">
            @error('tiempo_estimado')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="icono">Icono</label>
            <input type="text" id="icono" name="icono" class="form-control"
                maxlength="10" placeholder="🔧" value="{{ old('icono', '🔧') }}">
            @error('icono')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-custom-success">Guardar Servicio</button>
            <a href="{{ route('servicios.index') }}" class="btn-custom-danger">Cancelar</a>

        </div>
    </form>
</div>
@endsection