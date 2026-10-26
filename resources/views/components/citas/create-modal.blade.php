<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateCita">
    Programar cita
</button>

<div class="modal fade" id="modalCreateCita" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Programar cita</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('cita.create') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Paciente</label>
                        <select name="paciente_id" class="form-select" required>
                            <option value="">Selecciona un paciente</option>
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Médico</label>
                        <select name="medico_id" class="form-select" required>
                            <option value="">Selecciona un médico</option>
                            @foreach ($medicos->where('activo', 1) as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->nombre }} - {{ $medico->especialidad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Consultorio</label>
                        <select name="consultorio_id" class="form-select" required>
                            <option value="">Selecciona un consultorio</option>
                            @foreach ($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control" min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Hora</label>
                            <select name="hora" class="form-select" required>
                                <option value="">Selecciona</option>
                                @foreach ($horas as $h)
                                    <option value="{{ $h }}">{{ $h }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motivo (opcional)</label>
                        <input type="text" name="motivo" class="form-control">
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