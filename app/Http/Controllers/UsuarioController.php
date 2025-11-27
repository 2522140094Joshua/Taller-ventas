<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Services\LogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    
     public function list()
    {
        $userRol = Auth::user()->rol;
        
        // Filtrar usuarios según el rol del usuario autenticado
        if ($userRol === 'administrador') {
            // Administrador ve todos los usuarios
            $usuarios = User::all();
        } elseif ($userRol === 'profesor') {
            // Profesor solo ve clientes (alumnos)
            $usuarios = User::where('rol', 'cliente')->get();
        } else {
            // Otros roles no deberían acceder, pero por seguridad
            $usuarios = collect(); // Lista vacía
        }
        
        return view('users.lista', compact('usuarios'));
    }
    
    
    public function destroy($id)
    {
        $usuario = User::find($id);
        
        // Log de eliminación de usuario
        LogService::logDelete('USUARIO', [
            'usuario_id' => $id,
            'nombre' => $usuario->name,
            'email' => $usuario->email,
            'rol' => $usuario->rol
        ]);
        
        $usuario->delete();
        return redirect()->route('usuarios');
    }

    public function edit($id)
    {
        $usuario = User::find($id);   

        $usuarios = User::all(); 
        return 
        view('users.nueva', compact('usuarios', 'usuario'));
    }

    public function index(){

        $usuario = new User(); 
        $usuarios = User::all();
        return 
        view('users.nueva', compact('usuarios', 'usuario'));
    }



//Funcion en clase

    public function store(Request $request){
    
         if ($request->id) {
          // Editar usuario existente
            $usuario = User::find($request->id);
                if (!$usuario) {
                return redirect()->back()->with('error', 'usuario no encontrado');
                }
            $accion = 'actualizar';
        } else {
            // Crear nuevo usuario
                $usuario = new User();
            $accion = 'crear';
        }

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        
        
        // Solo hashear la contraseña si se proporciona una nueva
        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }
        
        $usuario->rol = $request->rol;
        $usuario->save();

        // Log de creación/actualización de usuario
        LogService::logAdminAction('GESTION_USUARIO', [
            'accion' => $accion,
            'usuario_id' => $usuario->id,
            'nombre' => $usuario->name,
            'email' => $usuario->email,
            'rol' => $usuario->rol
        ]);

        return redirect()->route('usuarios')->with('success', 'Usuario guardado correctamente.');
        
    }

}
