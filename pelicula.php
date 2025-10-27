<?php

require "includes/peliculas.php";



$id_pelicuula = isset($_GET['id']) ? $_GET['id'] : '';


$tarjeta = '';
foreach($peliculas as $pelicula){
            if($pelicula['id'] === $id_pelicuula)
                {
                $tarjeta = "
                        <div class=\"card mb-3\">
                        <img src=\"...\" class=\"card-img-top\" alt=\"...\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Card title</h5>
                            <p class=\"card-text\">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class=\"card-text\"><small class=\"text-body-secondary\">Last updated 3 mins ago</small></p>
                        </div>
                    </div>";
                };
        }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelicula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <?php echo $tarjeta ?>
        
    </div>
</body>
</html>