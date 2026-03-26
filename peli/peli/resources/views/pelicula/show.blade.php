<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Peliculas - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Maikel Pilligua</h1>
<div class="container mt-5">
    <h1>{{ $pelicula->titulo }}</h1>
    <div class="row">
        <div class="col-md-4">
            @if($pelicula->pais)
                <img src="{{ asset('portades/' . $pelicula->imatge) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/300x400" class="img-fluid">
            @endif
        </div>
        <div class="col-md-8">
            <p><strong>Actores: </strong></p>
                <ul>
                    @foreach($pelicula->actores as $actor)
                        <li>{{ $actor->nombre }}</li>
                    @endforeach
                </ul>
            <p><strong>Pais:</strong> {{ $pelicula->pais }}</p>
            <p><strong>Año de estreno:</strong> {{ $pelicula->anoEstreno }}</p>
            <p><strong>Nomiaciones a Oscars:</strong> {{ $pelicula->numeroDeNominacionesOscar }} </p>
            <p><strong>Número de Oscars</strong> {{ $pelicula->numeroOscars }} </p>
            <a href="/peliculas" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>
</body>
