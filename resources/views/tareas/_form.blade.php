<div class="form-group">
    <label for="titulo">Título *</label>
    <input type="text" id="titulo" name="titulo"
           value="{{ old('titulo', $tarea->titulo ?? '') }}"
           class="{{ $errors->has('titulo') ? 'is-invalid' : '' }}"
           maxlength="100">
    @error('titulo')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="descripcion"
              class="{{ $errors->has('descripcion') ? 'is-invalid' : '' }}"
              maxlength="500">{{ old('descripcion', $tarea->descripcion ?? '') }}</textarea>
    @error('descripcion')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="prioridad">Prioridad *</label>
    <select id="prioridad" name="prioridad"
            class="{{ $errors->has('prioridad') ? 'is-invalid' : '' }}">
        @foreach(['baja','media','alta'] as $p)
            <option value="{{ $p }}"
                {{ old('prioridad', $tarea->prioridad ?? 'media') === $p ? 'selected' : '' }}>
                {{ ucfirst($p) }}
            </option>
        @endforeach
    </select>
    @error('prioridad')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="fecha_limite">Fecha límite</label>
    <input type="date" id="fecha_limite" name="fecha_limite"
           value="{{ old('fecha_limite', isset($tarea) && $tarea->fecha_limite ? $tarea->fecha_limite->format('Y-m-d') : '') }}"
           class="{{ $errors->has('fecha_limite') ? 'is-invalid' : '' }}"
           min="{{ date('Y-m-d') }}">
    @error('fecha_limite')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>