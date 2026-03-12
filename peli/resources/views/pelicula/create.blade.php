<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Nueva pelicula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Afegir un nou pelicula</h1>

<form action="/peliculas/store" method="POST" class="mt-4 p-4 border rounded bg-light">
    @csrf  <div class="mb-3">
        <label class="form-label">Titulo de la del pelicula</label>
        <input type="text" name="titulo" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Pais</label>
        <input type="text" name="pais" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Año de estreno</label>
        <input type="number" name="anoEstreno" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Numero de nominaciones de Oscars</label>
        <input type="number" name="numeroDeNominacionesOscar" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Numero de Oscars</label>
        <input type="number" name="numeroOscars" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Guardar a la biblioteca</button>
    <a href="/peliculas" class="btn btn-link">Tornar enrere</a>
</form>
</body>
</html>
