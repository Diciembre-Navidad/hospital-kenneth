<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Lobby</title>
</head>
<body class="bg-light">
    <x-navbar />

    <main class="container py-4">
        <x-alertas />

        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <p class="text-uppercase text-secondary fw-semibold mb-1">Panel principal</p>
                <h1 class="h3 mb-4">Resumen de la clínica</h1>

<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <a href="{{ route('cita.get') }}" class="card text-decoration-none h-100">
            <div class="card-body">
                <div class="text-muted small">Citas de hoy</div>
                <div class="display-6">{{ $citasHoy }}</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-3">
        <a href="{{ route('medico.get') }}" class="card text-decoration-none h-100">
            <div class="card-body">
                <div class="text-muted small">Médicos activos</div>
                <div class="display-6">{{ $medicosActivos }}</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-3">
        <a href="{{ route('paciente.get') }}" class="card text-decoration-none h-100">
            <div class="card-body">
                <div class="text-muted small">Pacientes registrados</div>
                <div class="display-6">{{ $totalPacientes }}</div>
            </div>
        </a>
    </div>
    <div class="col-6 col-lg-3">
        <a href="{{ route('reporte.consultas') }}" class="card text-decoration-none h-100">
            <div class="card-body">
                <div class="text-muted small">Consultas realizadas</div>
                <div class="display-6">{{ $realizadas }}</div>
            </div>
        </a>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-2">
    <h2 class="h5 mb-0">Próximas citas</h2>
    <a href="{{ route('cita.get') }}" class="btn btn-primary btn-sm">Ver todas</a>
</div>

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Consultorio</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($proximas as $cita)
            <tr>
                <td>{{ $cita->fecha }}</td>
                <td>{{ substr($cita->hora, 0, 5) }}</td>
                <td>{{ $cita->paciente->nombre }}</td>
                <td>{{ $cita->medico->nombre }}</td>
                <td>{{ $cita->consultorio->nombre }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">No hay citas programadas</td>
            </tr>
        @endforelse
    </tbody>
</table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>