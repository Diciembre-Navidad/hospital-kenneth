<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdateMedico{{ $medico->id }}">
    Editar
</button>

<div class="modal fade" id="modalUpdateMedico{{ $medico->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar médico</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('medico.update', $medico->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $medico->nombre }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cédula profesional</label>
                        <input type="text" name="cedula" class="form-control" value="{{ $medico->cedula }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Especialidad</label>
                        <select name="especialidad_id" class="form-select" required>
                            <option value="">Selecciona una opción</option>
                            @foreach ($especialidades as $opcion)
                                <option value="{{ $opcion->id }}" {{ $medico->especialidad_id == $opcion->id ? 'selected' : '' }}>{{ $opcion->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select name="activo" class="form-select" required>
                            <option value="1" {{ $medico->activo == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ $medico->activo == 0 ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>