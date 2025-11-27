@extends('adminlte::page')

@section('title', 'usuarios')

@section('content_header')
    <h1>{{ $usuario->id ? 'Editar Usuario' : 'Registrar Nuevo Usuario' }}</h1>
@stop


@section('content')
 <div class="card">
        <div class="card-body">
            <form action="{{ route('usuario.guardar') }}" method="POST">  
                <input type="hidden" name="id" value="{{$usuario->id}}">              
                @csrf

                
            <div class="form-group">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ $usuario->name}}">
            </div>

                
            <div class="form-group">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required value="{{ $usuario->email}}">
            </div>

             
              
            <div class="form-group">
                <label for="password" class="form-label">Contraseña {{ $usuario->id ? '(dejar en blanco para mantener la actual)' : '' }}</label>
                <input type="password" name="password" id="password" class="form-control" {{ $usuario->id ? '' : 'required' }} minlength="8">
            </div>
            
            
            <div class="form-group">
                <label for="rol" class="form-label">Rol</label>
                <select name="rol" id="rol" class="form-control" required>
                    <option value="">Seleccione un rol</option>
                    <option value="cliente" {{ old('rol', $usuario->rol ?? '') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                    <option value="profesor" {{ old('rol', $usuario->rol ?? '') == 'profesor' ? 'selected' : '' }}>Profesor</option>
                    <option value="administrador" {{ old('rol', $usuario->rol ?? '') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

               
                <button type="submit" class="btn btn-primary">{{ $usuario->id ? 'Actualizar' : 'Guardar' }}</button>
                <a href="{{ route('usuarios') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@stop
