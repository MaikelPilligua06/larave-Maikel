<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Peliculas - Llistat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Maikel Pilligua</h1>
<h2>Detalles de la pelicula: <?php echo $pelicula->titulo?></h2>
<form action="/peliculas/{{ $pelicula->id }}/editar" method="POST" class="mt-4 p-4 border rounded bg-light" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Titulo</label>
        <input type="text" name="titulo" value="<?php echo $pelicula->titulo?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Pais</label>
        <input type="text" name="pais" value="<?php echo $pelicula->pais?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Año de estreno</label>
        <input type="text" name="anoEstreno" value="<?php echo $pelicula->anoEstreno?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Nominaciones a los Oscars</label>
        <input type="text" name="numeroDeNominacionesOscar" value="<?php echo $pelicula->numeroDeNominacionesOscar?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Número de Oscars</label>
        <input type="text" name="numeroOscars" value="<?php echo $pelicula->numeroOscars?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Portada</label>
        <img src="{{ asset('portades/' . $pelicula->imatge) }}" class="img-fluid rounded"/>
        <input type="file" name="imatge" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Selecciona los actores: </label>
        <select name="actores[]" class="form-select" multiple>
            @foreach($actores as $actor)
                <option value="{{ $actor->id }}"> {{ $actor->nombre }}</option>
            @endforeach
        </select>
        <small class="muted-text">Manten presionado Ctrl para seleccionar más de uno</small>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="/peliculas" class="btn btn-link">Tornar enrere</a>
</form>
</body>
