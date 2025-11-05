<?php

$servidor = 'localhost';
$usuario = 'romen';
$contrasena = '230904';
$base_datos = 'gestion_usuarios';


$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if($conexion->connect_error){
    die("Conexion fallida: " . $conexion->connect_error);
}

//recoger datos usuario
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
$nombre = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$correo = isset($_POST['email']) ? $_POST['email'] : '';
$edad = isset($_POST['edad']) ? $_POST['edad'] : '';


function crearUsuario($conexion, $nombre, $correo, $edad) {
    $sql = "INSERT INTO usuarios (nombre, email, edad) VALUES ('$nombre', '$correo', '$edad')";

    if ($conexion->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: no se pudo crear" . $conexion->error;
    }
}


function eliminarUsuario($conexion, $nombre){
    $sql = "DELETE FROM usuarios WHERE nombre = '$nombre'";

    if ($conexion->query($sql) === TRUE) {
        echo "Registro borrado exitosamente";
    } else {
        echo "Error: no se pudo borrar el registro";
    }

}


function actualizarUsuario($conexion, $nombre, $correo, $edad){
    $sql = "UPDATE usuarios
            SET nombre = '$nombre', email = '$correo', edad = '$edad'
            WHERE nombre = '$nombre'";


    if ($conexion->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "ERROR: no se pudo actualizar el registro";
    }
};


function leerUsuario($conexion, $nombre) {
    $sql = "SELECT * FROM usuarios  WHERE nombre = '$nombre'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0){
        while ($fila = $resultado->fetch_assoc()){
            mostrarResultadosEnTabla($fila);
        }
    } else {
        echo "No se encontraron resultados";
    }

};


function mostrarResultadosEnTabla($fila){
    echo "<h3>Resultados:</h3>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<thead><tr style='background-color: #f2f2f2;'>
          <th>ID</th><th>Nombre</th><th>Email</th><th>Edad</th>
          </tr></thead><tbody>";
    echo "<tr>
          <td>{$fila['id']}</td>
          <td>{$fila['nombre']}</td>
          <td>{$fila['email']}</td>
          <td>{$fila['edad']}</td>
          </tr>";
    echo "</tbody></table>";
};


if ($accion === 'create') {
    if (empty($nombre) || empty($correo)){
        echo "ERROR: Los campos Usuario y Correo son obligatorios";
    }else {
        $edad = ($edad === '') ? NULL : (int)$edad;
        crearUsuario($conexion, $nombre, $correo, $edad);
    }
}

if ($accion === 'delete') {
    if (empty($nombre)){
        $conexion->error;
        echo "El campo usuario es obligatorio";
    } else {
        eliminarUsuario($conexion, $nombre);
    }
}


if ($accion === 'update') {
    if (empty($nombre)){
        echo "El campo usuario es obligatorio" . $conexion->error;;
    } else {
        actualizarUsuario($conexion, $nombre, $correo, $edad);
    }
}


if ($accion === 'select') {
    if (empty($nombre)){
        echo "noo";
    } else {
        leerUsuario($conexion, $nombre);
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

    <form action="mysqliOB.php" method="post">
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
$conexion->close();
?>