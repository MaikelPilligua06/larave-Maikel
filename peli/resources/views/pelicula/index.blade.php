<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Peliculas - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1 class="mb-4">Llistat de Peliculas</h1>
<h2 class="mb-4">Maikel Pilligua</h2>
<form action="/peliculas/crear" method="GET">
    <button type="submit">Crear una pelicula</button>
</form>

    <table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Titulo</th>
        <th>Pais</th>
        <th>Año estreno</th>
        <th>Numero de nominaciones</th>
        <th>Numero de oscars</th>
    </tr>
    </thead>
    <tbody>
    @forelse($pelicula as $asd)
        <tr>
            <td>{{ $asd->titulo }}</td>
            <td>{{ $asd->pais }}</td>
            <td>{{ $asd->anoEstreno}}</td>
            <td>{{ $asd->numeroDeNominacionesOscar }} </td>
            <td>{{ $asd->numeroOscars }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center">No hay peliculas</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
