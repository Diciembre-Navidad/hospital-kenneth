<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdatePaciente{{ $paciente->id }}">
    Editar
</button>

<div class="modal fade" id="modalUpdatePaciente{{ $paciente->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar paciente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('paciente.update', $paciente->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $paciente->nombre }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $paciente->fecha_nacimiento }}" required>
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