<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalUpdateCita{{ $cita->id }}">
    Editar
</button>

<div class="modal fade" id="modalUpdateCita{{ $cita->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar cita</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('cita.update', $cita->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Paciente</label>
                        <select name="paciente_id" class="form-select" required>
                            <option value="">Selecciona un paciente</option>
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" {{ $cita->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Médico</label>
                        <select name="medico_id" class="form-select" required>
                            <option value="">Selecciona un médico</option>
                            @foreach ($medicos as $medico)
                                <option value="{{ $medico->id }}" {{ $cita->medico_id == $medico->id ? 'selected' : '' }}>{{ $medico->nombre }} - {{ $medico->especialidad->nombre }}{{ $medico->activo ? '' : ' (inactivo)' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Consultorio</label>
                        <select name="consultorio_id" class="form-select" required>
                            <option value="">Selecciona un consultorio</option>
                            @foreach ($consultorios as $consultorio)
                                <option value="{{ $consultorio->id }}" {{ $cita->consultorio_id == $consultorio->id ? 'selected' : '' }}>{{ $consultorio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control" min="{{ date('Y-m-d') }}" value="{{ $cita->fecha }}" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Hora</label>
                            <select name="hora" class="form-select" required>
                                <option value="">Selecciona</option>
                                @foreach ($horas as $h)
                                    <option value="{{ $h }}" {{ substr($cita->hora, 0, 5) == $h ? 'selected' : '' }}>{{ $h }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Motivo (opcional)</label>
                        <input type="text" name="motivo" class="form-control" value="{{ $cita->motivo }}">
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