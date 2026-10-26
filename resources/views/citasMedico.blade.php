<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Citas por Médico</title>
</head>
<body>
    <x-navbar/>
    <div class="container mt-4">
        <x-alertas/>

        <h1 class="h3">Citas programadas</h1>
<p><strong>Médico:</strong> {{ $medico->nombre }} ({{ $medico->especialidad->nombre }})</p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Consultorio</th>
            <th>Motivo</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($citas as $cita)
            <tr>
                <td>{{ $cita->fecha }}</td>
                <td>{{ substr($cita->hora, 0, 5) }}</td>
                <td>{{ $cita->paciente->nombre }}</td>
                <td>{{ $cita->consultorio->nombre }}</td>
                <td>{{ $cita->motivo }}</td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center">Este médico no tiene citas programadas</td></tr>
        @endforelse
    </tbody>
</table>
<a href="{{ route('medico.get') }}" class="btn btn-secondary">Volver a médicos</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>