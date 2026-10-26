<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">Clínica</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cita.get') }}">Citas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('paciente.get') }}">Pacientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('medico.get') }}">Médicos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('especialidad.get') }}">Especialidades</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('consultorio.get') }}">Consultorios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reporte.consultas') }}">Reportes</a></li>
            </ul>
        </div>
    </div>
</nav>