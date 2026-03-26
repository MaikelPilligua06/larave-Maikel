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
<form action="/actores" method="GET">
    <button type="submit">Ver actores</button>
</form>
<form action="/actores/actorxpelicula" method="GET">
    <button type="submit">Listar actor por pelicula</button>
</form>
<form action="/pelicula/peliculaxactor" method="GET">
    <button type="submit">Listar pelicula por autor</button>
</form>
    <table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Titulo</th>
        <th>Pais</th>
        <th>Año estreno</th>
        <th>Numero de nominaciones</th>
        <th>Numero de oscars</th>
        <th>Información</th>
        <th>Borrar</th>
        <th>Editar</th>
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
            <td>
                <a href="/peliculas/{{ $asd->id }}" class="btn btn-info btn-sm">Veure</a>
            </td>
            <td>
                <a href="/peliculas/eliminar/{{ $asd->id }}" class="btn btn-info btn-sm">Borrar pelicula</a>
            </td>
            <td>
                <a href="/peliculas/{{ $asd->id }}/editar" class="btn btn-info btn-sm">Editar pelicula</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center">No hay peliculas</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
