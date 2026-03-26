<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Peliculas por actor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1 class="mb-4">Listado libro por actor</h1>
<h2 class="mb-4">Maikel Pilligua</h2>
<form action="/peliculas" method="GET">
    <button type="submit">Ver peliculas</button>
</form>
<form action="/actores" method="GET">
    <button type="submit">Ver actores</button>
</form>
<form action="/actores/actorxpelicula" method="GET">
    <button type="submit">Listar actor por libro</button>
</form>

<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Pelicula</th>
        <th>Actor</th>
    </tr>
    </thead>
    <tbody>
    @forelse($pelicula as $peli)
        <tr>
            <td>{{ $peli->titulo }}</td>
             @foreach($peli->actores as $actor)
                 <td>{{ $actor->nombre }}</td>
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
