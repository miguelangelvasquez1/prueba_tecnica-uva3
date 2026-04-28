@extends('tareas.layouts.app')

@section('content')

<h2 class="page-title">Todas las tareas</h2>

@if($tareas->isEmpty())
    <div class="empty-state">
        <div class="icon">📋</div>
        <p>No hay tareas todavía.</p>
        <a href="{{ route('tareas.create') }}" class="btn btn-primary" style="margin-top:1rem;">Crear primera tarea</a>
    </div>
@else
    @foreach($tareas as $tarea)
        <div class="tarea-card {{ $tarea->completada ? 'completada' : '' }}">
            <div class="tarea-main">
                <div class="tarea-titulo">
                    {{ $tarea->completada ? '✓' : '○' }}
                    {{ $tarea->titulo }}
                </div>
                <div class="tarea-meta" style="display:flex; gap:0.75rem; flex-wrap:wrap; margin-top:0.4rem; align-items:center;">
                    <span class="badge badge-{{ $tarea->prioridad }}">{{ $tarea->prioridad }}</span>
                    @if($tarea->fecha_limite)
                        <span>📅 {{ $tarea->fecha_limite->format('d/m/Y') }}</span>
                    @endif
                    @if($tarea->descripcion)
                        <span style="color:#55546e;">{{ Str::limit($tarea->descripcion, 60) }}</span>
                    @endif
                </div>
            </div>

            <div class="tarea-actions">
                {{-- Toggle completada --}}
                <form action="{{ route('tareas.toggle', $tarea->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" class="btn btn-sm btn-secondary" title="Cambiar estado">
                        {{ $tarea->completada ? '↺' : '✓' }}
                    </button>
                </form>

                {{-- Editar --}}
                <a href="{{ route('tareas.edit', $tarea->id) }}" class="btn btn-sm btn-secondary">Editar</a>

                {{-- Eliminar --}}
                <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST"
                      onsubmit="return confirm('¿Seguro que deseas eliminar esta tarea?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
@endif

@endsection