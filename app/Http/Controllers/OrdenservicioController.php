<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdenServicio;
use App\Models\Cliente;
use App\Models\Usuario;

class OrdenservicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $OrdenDeServicio = OrdenServicio::all();
        return view('ordenservicio.index', compact('OrdenDeServicio'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $usuarios = Usuario::all();
        
        return view('ordenservicio.create', compact('clientes', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required',
            'usuario_id' => 'required',
            'codigo_orden' => 'required|unique:orden_de_servicio,codigo_orden',
            'descripcion' => 'required',
            'tipo_servicio' => 'required',
            'prioridad' => 'required',
        ]);

        OrdenServicio::create($request->all());

        return redirect()->route('ordenservicio.index')->with('success', 'Orden creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orden = OrdenServicio::findOrFail($id);
        $clientes = Cliente::all();
        $usuarios = Usuario::all();

        return view('ordenservicio.edit', compact('orden', 'clientes', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo_servicio' => 'required',
            'prioridad' => 'required',
            'estado' => 'required',
            'fecha_cierre_estimada' => 'nullable|date',
        ]);

        $orden = OrdenServicio::findOrFail($id);
        $orden->update($request->only(['tipo_servicio', 'prioridad', 'estado', 'fecha_cierre_estimada']));

        return redirect()->route('ordenservicio.index')->with('success', 'Orden actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}