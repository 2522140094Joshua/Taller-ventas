<?php
namespace App\Http\Controllers;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index()
    {
        $servicios = Servicio::where('activo', true)->get();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('servicios.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'tiempo_estimado' => 'nullable|integer',
            'icono' => 'nullable|max:10'
        ]);

        Servicio::create($validated);
        return redirect()->route('servicios.index')
                        ->with('success', 'Servicio creado exitosamente');
    }

    public function show(Servicio $servicio)
    {
        return view('servicios.show', compact('servicio'));
    }

    public function edit(Servicio $servicio)
    {
        return view('servicios.edit', compact('servicio'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'tiempo_estimado' => 'nullable|integer',
            'icono' => 'nullable|max:10'
        ]);

        $servicio->update($validated);
        return redirect()->route('servicios.index')
                        ->with('success', 'Servicio actualizado exitosamente');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicios.index')
                        ->with('success', 'Servicio eliminado exitosamente');
    }
}