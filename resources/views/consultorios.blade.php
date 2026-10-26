<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Consultorios</title>
</head>
<body>
    <x-navbar/>
    <div class="container mt-4">
        <x-alertas/>

        <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Consultorios</h1>
    <x-consultorios.create-modal/>
</div>

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($consultorios as $consultorio)
            <tr>
                <td>{{ $consultorio->id }}</td>
                <td>{{ $consultorio->nombre }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <x-consultorios.update-modal :consultorio="$consultorio"/>
                        <x-consultorios.delete-modal :consultorio="$consultorio"/>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>