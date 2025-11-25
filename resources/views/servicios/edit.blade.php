@extends('layouts.app')

@section('title', 'Editar Servicio')
@section('header', 'Editar Servicio')

@section('styles')
<style>
    /* Mismo CSS que create.blade.php */
    .form-container {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        max-width: 800px;
        margin: 0 auto;
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
</style>
@endsection

@section('content')
<div class="form-container">
    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre del Servicio </label>
            <input type="text" id="nombre" name="nombre" class="form-control" 
                   value="{{ old('nombre', $servicio->nombre) }}" required>
            @error('nombre')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción </label>
            <textarea id="descripcion" name="descripcion" class="form-control" 
                      required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
            @error('descripcion')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio </label>
            <input type="number" id="precio" name="precio" class="form-control" 
                   step="0.01" min="0" value="{{ old('precio', $servicio->precio) }}" required>
            @error('precio')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="tiempo_estimado">Tiempo Estimado </label>
            <input type="number" id="tiempo_estimado" name="tiempo_estimado" 
                   class="form-control" min="0" value="{{ old('tiempo_estimado', $servicio->tiempo_estimado) }}">
            @error('tiempo_estimado')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="icono">Icono </label>
            <input type="text" id="icono" name="icono" class="form-control" 
                   maxlength="10" placeholder="🔧" value="{{ old('icono', $servicio->icono) }}">
            @error('icono')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Actualizar Servicio</button>
            <a href="{{ route('servicios.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection