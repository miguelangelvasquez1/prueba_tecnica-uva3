<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::orderBy('created_at', 'desc')->get();
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'      => 'required|min:3|max:100',
            'descripcion' => 'nullable|max:500',
            'prioridad'   => 'required|in:baja,media,alta',
            'fecha_limite'=> 'nullable|date|after_or_equal:today',
        ], [
            'titulo.required' => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
            'titulo.min'      => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
            'titulo.max'      => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
            'descripcion.max' => 'La descripción no puede superar los 500 caracteres.',
            'prioridad.required' => 'La prioridad debe ser baja, media o alta.',
            'prioridad.in'    => 'La prioridad debe ser baja, media o alta.',
            'fecha_limite.date'          => 'La fecha límite debe ser hoy o una fecha futura.',
            'fecha_limite.after_or_equal'=> 'La fecha límite debe ser hoy o una fecha futura.',
        ]);

        Tarea::create($request->only(['titulo', 'descripcion', 'prioridad', 'fecha_limite']));

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    public function edit(string $id)
    {
        $tarea = Tarea::findOrFail($id);
        return view('tareas.edit', compact('tarea'));
    }

    public function update(Request $request, string $id)
    {
        $tarea = Tarea::findOrFail($id);

        $request->validate([
            'titulo'      => 'required|min:3|max:100',
            'descripcion' => 'nullable|max:500',
            'prioridad'   => 'required|in:baja,media,alta',
            'fecha_limite'=> 'nullable|date|after_or_equal:today',
        ], [
            'titulo.required' => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
            'titulo.min'      => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
            'titulo.max'      => 'El título es obligatorio y debe tener entre 3 y 100 caracteres.',
            'descripcion.max' => 'La descripción no puede superar los 500 caracteres.',
            'prioridad.required' => 'La prioridad debe ser baja, media o alta.',
            'prioridad.in'    => 'La prioridad debe ser baja, media o alta.',
            'fecha_limite.date'          => 'La fecha límite debe ser hoy o una fecha futura.',
            'fecha_limite.after_or_equal'=> 'La fecha límite debe ser hoy o una fecha futura.',
        ]);

        $tarea->update($request->only(['titulo', 'descripcion', 'prioridad', 'fecha_limite']));

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea eliminada.');
    }

    public function toggle(string $id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->update(['completada' => !$tarea->completada]);

        return redirect()->route('tareas.index');
    }
}