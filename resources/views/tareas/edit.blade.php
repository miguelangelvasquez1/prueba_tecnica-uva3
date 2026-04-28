@extends('tareas.layouts.app')

@section('content')

<h2 class="page-title">Editar tarea</h2>

<div class="card">
    <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
        @csrf @method('PUT')
        @include('tareas._form')
        <div style="display:flex; gap:0.75rem; margin-top:1.5rem;">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

@endsection