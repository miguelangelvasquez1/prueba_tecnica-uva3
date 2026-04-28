@extends('tareas.layouts.app')

@section('content')

<h2 class="page-title">Nueva tarea</h2>

<div class="card">
    <form action="{{ route('tareas.store') }}" method="POST">
        @csrf
        @include('tareas._form')
        <div style="display:flex; gap:0.75rem; margin-top:1.5rem;">
            <button type="submit" class="btn btn-primary">Crear tarea</button>
            <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>

@endsection