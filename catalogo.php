<?php

require "includes/peliculas.php";

//obteniendo datos del formulario
$generoSeleccionado = isset($_GET['genero']) ? $_GET['genero'] : '';

//filtrando peliculas
$peliculasFiltradas = [];

if ($generoSeleccionado == '') {
    $peliculasFiltradas = $peliculas;
} else {
    foreach ($peliculas as $pelicula) {
        if ($pelicula['genero'] == $generoSeleccionado) {
            $peliculasFiltradas[] = $pelicula;
        }
    }
}

//generando listado de generos
$generos = [];

foreach ($peliculas as $pelicula) {
    if (!in_array($pelicula['genero'], $generos)) {
        $generos[] = $pelicula['genero'];
    }
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <style>
        .card {
            margin: 8px;
        }
    </style>
</head>
<body>
    <div>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                    <a class="navbar-brand">Catalogo de peliculas</a>
                    <form class="d-flex" role="search" method="GET" action="catalogo.php">
                        <select class="form-select" aria-label="Default select example" name="genero">
                            <option value="">Todos los generos</option>  
                            <?php foreach ($generos as $genero): ?>
                                <option value="<?php echo $genero; ?>"
                                    <?php echo ($generoSeleccionado === $genero) ? 'selected' : ''; ?>>
                                    <?php echo $genero; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
            </div>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <?php foreach ($peliculasFiltradas as $pelicula): ?>
                <div class="col-3">
                    <div class="card">
                        <img src="<?php echo $pelicula['poster']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $pelicula['titulo']; ?></h5>
                            <p class="card-text"><?php echo $pelicula['director']; ?></p>
                            <p class="card-text"><?php echo $pelicula['anio']; ?></p>
                            <p class="card-text"><?php echo $pelicula['genero']; ?></p>
                            <a href="pelicula.php?id=<?php echo $pelicula['id'];?>" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
