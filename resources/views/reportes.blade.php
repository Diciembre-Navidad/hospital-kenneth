<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>TITULO</title>
</head>
<body>
    <x-navbar/>
    <div class="container mt-4">
        <x-alertas/>

       <h1 class="h3">Consultas realizadas</h1>
<p class="fs-4">Total de consultas realizadas: <strong>{{ $total }}</strong></p>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Médico</th>
            <th>Especialidad</th>
            <th>Programadas</th>
            <th>Realizadas</th>
            <th>Canceladas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($medicos as $medico)
            <tr>
                <td>{{ $medico->nombre }}</td>
                <td>{{ $medico->especialidad->nombre }}</td>
                <td>{{ $medico->citas->where('estado', 'programada')->count() }}</td>
                <td>{{ $medico->citas->where('estado', 'realizada')->count() }}</td>
                <td>{{ $medico->citas->where('estado', 'cancelada')->count() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>