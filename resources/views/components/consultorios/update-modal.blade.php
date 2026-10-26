<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdateConsultorio{{ $consultorio->id }}">
    Editar
</button>

<div class="modal fade" id="modalUpdateConsultorio{{ $consultorio->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar consultorio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('consultorio.update', $consultorio->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre o número</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $consultorio->nombre }}" required>
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