<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Peliculas por actor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1 class="mb-4">Llistat de actor por pelicula</h1>
<h2 class="mb-4">Maikel Pilligua</h2>
<form action="/peliculas/crear" method="GET">
    <button type="submit">Crear una pelicula</button>
</form>
<form action="/actores" method="GET">
    <button type="submit">Ver actores</button>
</form>
<form action="/pelicula/peliculaxactor" method="GET">
    <button type="submit">Listar libro por autor</button>
</form>

<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Actor</th>
        <th>Peliculas</th>
    </tr>
    </thead>
    <tbody>
    @forelse($actores as $actor)
        <tr>
            <td>{{ $actor->nombre }}</td>
            @foreach($actor->pelicula as $peli)
                <td>
                    <a href="/peliculas/{{ $peli->id }}">

                    {{ $peli->titulo }}
                    </a>

                </td>
            @endforeach
        </tr>
    @empty
        <tr>
            <td colspan="2" class="text-center">No hay peliculas o actores</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
