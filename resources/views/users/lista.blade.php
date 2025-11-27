@extends('adminlte::page')

@section('title', 'usuarios')

@section('content_header')
    <h1>{{ Auth::user()->rol === 'profesor' ? 'Alumnos' : 'Usuarios' }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="user-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        @if(Auth::user()->rol === 'administrador')
                            <th>Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>            
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->rol}}</td>
                        @if(Auth::user()->rol === 'administrador')
                            <td>
                                <a href="{{route('usuario.editar', $usuario->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{route('usuario.eliminar', $usuario->id)}}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                    @endforeach                    
                </tbody>
            </table>
        </div>
    </div>
@stop



