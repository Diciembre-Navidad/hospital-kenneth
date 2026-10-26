<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateMedico">
    Crear médico
</button>

<div class="modal fade" id="modalCreateMedico" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Crear médico</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('medico.create') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cédula profesional</label>
                        <input type="text" name="cedula" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Especialidad</label>
                        <select name="especialidad_id" class="form-select" required>
                            <option value="">Selecciona una opción</option>
                            @foreach ($especialidades as $opcion)
                                <option value="{{ $opcion->id }}">{{ $opcion->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <select name="activo" class="form-select" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>