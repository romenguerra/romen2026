<?php

//conectarse a la base de datos
$dsn = 'mysql:host=localhost;dbname=gestion_usuarios';
$usuario = 'romen';
$contrasena = '230904';


try {
    $conexion = new PDO($dsn, $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion exitosa";
} catch (PDOException $e) {
    echo "Error en la conexion: " . $e->getMessage();
}



//recoger datos formulario
$accion = $_POST['accion'];
$nombre = $_POST['usuario'];
$correo = $_POST['email'];
$edad = $_POST['edad'];

function crearUsuario($conexion, $nombre, $correo, $edad){

    $sql = 'INSERT INTO usuarios (nombre, email, edad) VALUES (:nombre, :correo, :edad)';
    $stmt = $conexion->prepare($sql);


    $datos = [
            'nombre' => $nombre,
            'email' => $correo,
            'edad' => $edad
    ];

    if ($stmt->execute($datos)){
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error en la inserción";
    }

}






?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos</title>
</head>
<body>
    <h1>CONEXION BASE DE DATOS</h1>

    <form action="PDO.php" method="post">
        <select name="accion" id="accion">
            <option value="create">Crear</option>
            <option value="select">Leer</option>
            <option value="update">Actualizar</option>
            <option value="delete">Eliminar</option>
        </select><br><br>

        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" id="usuario" value="">

        <label for="email">Correo: </label>
        <input type="email" name="email" id="email" value="">

        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad" value="">

        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
$conexion = null;
?>