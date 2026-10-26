<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Citas</title>
</head>
<body>
    <x-navbar/>
    <div class="container mt-4">
        <x-alertas/>

        <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Citas</h1>
    <x-citas.create-modal :pacientes="$pacientes" :medicos="$medicos" :consultorios="$consultorios" :horas="$horas"/>
</div>

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Consultorio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ substr($cita->hora, 0, 5) }}</td>
                <td>{{ $cita->paciente->nombre }}</td>
                <td>{{ $cita->medico->nombre }} ({{ $cita->medico->especialidad->nombre }})</td>
                <td>{{ $cita->consultorio->nombre }}</td>
                <td>{{ ucfirst($cita->estado) }}</td>
                <td>
                    @if ($cita->estado == 'programada')
                        <div class="d-flex gap-2">
                            <x-citas.update-modal :cita="$cita" :pacientes="$pacientes" :medicos="$medicos" :consultorios="$consultorios" :horas="$horas"/>
                            <x-citas.realizada-modal :cita="$cita"/>
                            <x-citas.cancel-modal :cita="$cita"/>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>