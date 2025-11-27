<?php

namespace App\Http\Controllers;

use App\Models\Refaccion;
use Illuminate\Http\Request;

class RefaccionesController extends Controller
{
    public function index()
    {
        $refacciones = Refaccion::activas()->orderBy('nombre')->get();
        return view('refacciones.index', compact('refacciones'));
    }

    public function create()
    {
        return view('refacciones.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'codigo' => 'required|max:100|unique:refacciones,codigo',
            'marca' => 'required|max:100',
            'categoria' => 'required|max:100',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'precio_compra' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'nullable|integer|min:0',
            'imagen' => 'nullable|max:10',
            'proveedor' => 'nullable|max:255'
        ]);

        Refaccion::create($validated);
        return redirect()->route('refacciones.index')
                        ->with('success', 'Refacción creada exitosamente');
    }

    public function show(Refaccion $refaccion)
    {
        return view('refacciones.show', compact('refaccion'));
    }

    public function edit(Refaccion $refaccion)
    {
        return view('refacciones.edit', compact('refaccion'));
    }

    public function update(Request $request, Refaccion $refaccion)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'codigo' => 'required|max:100|unique:refacciones,codigo,' . $refaccion->id,
            'marca' => 'required|max:100',
            'categoria' => 'required|max:100',
            'descripcion' => 'required',
            'precio' => 'required|numeric|min:0',
            'precio_compra' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'stock_minimo' => 'nullable|integer|min:0',
            'imagen' => 'nullable|max:10',
            'proveedor' => 'nullable|max:255'
        ]);

        $refaccion->update($validated);
        return redirect()->route('refacciones.index')
                        ->with('success', 'Refacción actualizada exitosamente');
    }

    public function destroy(Refaccion $refaccion)
    {
        $refaccion->delete();
        return redirect()->route('refacciones.index')
                        ->with('success', 'Refacción eliminada exitosamente');
    }
}