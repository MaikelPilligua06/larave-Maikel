<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Actores - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1 class="mb-4">Llistat de Actores</h1>
<h2 class="mb-4">Maikel Pilligua</h2>
<form action="/actores/crear" method="GET">
    <button type="submit">Crear una actor</button>
</form>
<form action="/peliculas" method="GET">
    <button type="submit">Ver peliculas</button>
</form>

<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Nombre</th>
        <th>Fecha de nacimiento</th>
        <th>Pais</th>
        <th>Borrar</th>
    </tr>
    </thead>
    <tbody>
    @forelse($actores as $asd)
        <tr>
            <td>{{ $asd->nombre }}</td>
            <td>{{ $asd->fechadeNacimiento }}</td>
            <td>{{ $asd->pais}}</td>
            <td>
                <a href="/actores/eliminar/{{ $asd->id }}" class="btn btn-info btn-sm">Borrar actor</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center">No hay actores</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
