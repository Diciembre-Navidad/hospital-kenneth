<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Historial</title>
</head>
<body>
    <x-navbar/>
    <div class="container mt-4">
        <x-alertas/>

        <h1 class="h3">Historial de citas</h1>
<p><strong>Paciente:</strong> {{ $paciente->nombre }}</p>
<p>
    Total: {{ $citas->count() }} |
    Realizadas: {{ $citas->where('estado', 'realizada')->count() }} |
    Programadas: {{ $citas->where('estado', 'programada')->count() }} |
    Canceladas: {{ $citas->where('estado', 'cancelada')->count() }}
</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Médico</th>
            <th>Especialidad</th>
            <th>Consultorio</th>
            <th>Estado</th>
            <th>Motivo</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($citas as $cita)
            <tr>
                <td>{{ $cita->fecha }}</td>
                <td>{{ substr($cita->hora, 0, 5) }}</td>
                <td>{{ $cita->medico->nombre }}</td>
                <td>{{ $cita->medico->especialidad->nombre }}</td>
                <td>{{ $cita->consultorio->nombre }}</td>
                <td>{{ ucfirst($cita->estado) }}</td>
                <td>{{ $cita->motivo }}</td>
            </tr>
        @empty
            <tr><td colspan="7" class="text-center">Este paciente todavía no tiene citas</td></tr>
        @endforelse
    </tbody>
</table>
<a href="{{ route('paciente.get') }}" class="btn btn-secondary">Volver a pacientes</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>