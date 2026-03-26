<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Nueva actor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
<h1>Afegir un nou actor</h1>

<form action="/actores/crear" method="POST" class="mt-4 p-4 border rounded bg-light" enctype="multipart/form-data">
    @csrf  <div class="mb-3">
        <label class="form-label">Nombre del actor</label>
        <input type="text" name="nombre" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha de Nacimiento</label>
        <input type="number" name="fechadeNacimiento" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Pais</label>
        <input type="text" name="pais" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Numero de Premios</label>
        <input type="number" name="numeroDePremios" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar actor</button>
    <a href="/actores" class="btn btn-link">Tornar enrere</a>
</form>
</body>
</html>
