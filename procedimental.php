<?php

$servidor = 'localhost';
$usuario = 'romen';
$contrasena = '230904';
$base_datos = 'gestion_usuarios';

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}
//echo "Conexion exitosa";


//recoger datos formularios
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
$nombre = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$correo = isset($_POST['email']) ? $_POST['email'] : '';
$edad = isset($_POST['edad']) ? $_POST['edad'] : '';


// echo '<pre>';
// echo $accion;
// echo $nombre;
// echo $correo;
// echo $edad;



function crearUsuario($conexion, $nombre, $correo, $edad){
    $insert = "INSERT INTO usuarios (nombre, email, edad) VALUES ('$nombre', '$correo', $edad)";

    if (mysqli_query($conexion, $insert)){
        echo "Nuevo resgistro creado exitosamente";
    }else {
        echo "Error: " . mysqli_error($conexion);
    }
}


function eliminarUsuario($conexion, $nombre) {
    $delete = "DELETE FROM usuarios WHERE nombre = '$nombre'";

    if (mysqli_query($conexion, $delete)){
        echo "Registro eliminado correctamente";
    }else {
        echo "ERROR: " . mysqli_error($conexion);
    }
}

function leer($conexion, $nombre){
    $leer = "SELECT * FROM usuarios WHERE nombre = '$nombre'";
    
    $resultado = mysqli_query($conexion, $leer);
    
    if ($resultado){
        // Verificar si encontró registros
        if (mysqli_num_rows($resultado) > 0) {
            // Mostrar los datos
            mostrarResultadosEnTabla($resultado);
            
        } else {
            echo "No se encontró ningún usuario con ese nombre";
        }
    } else {
        echo "ERROR: " . mysqli_error($conexion);
    }
}

function actualizarUsuario($conexion, $nombre, $correo, $edad){
    $update = "UPDATE usuarios
            SET nombre = '$nombre', email = '$correo', edad = '$edad'
            WHERE nombre = '$nombre'";

    if(mysqli_query($conexion, $update)){
        echo "Registro actualizado correctamente";
    }else {
        echo "ERROR: " . mysqli_error($conexion);
    }
}

function mostrarResultadosEnTabla($resultado){
    echo "<h3>Resultados:</h3>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<thead>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='padding: 8px; text-align: left;'>ID</th>";
    echo "<th style='padding: 8px; text-align: left;'>Nombre</th>";
    echo "<th style='padding: 8px; text-align: left;'>Email</th>";
    echo "<th style='padding: 8px; text-align: left;'>Edad</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";


    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td style='padding: 8px;'>" . $fila['id'] . "</td>";
        echo "<td style='padding: 8px;'>" . $fila['nombre'] . "</td>";
        echo "<td style='padding: 8px;'>" . $fila['email'] . "</td>";
        echo "<td style='padding: 8px;'>" . $fila['edad'] . "</td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    echo "</table>";
}

function leerTodosUsuarios($conexion) {
    $leer = "SELECT * FROM usuarios";
    
    $resultado = mysqli_query($conexion, $leer);
    
    if ($resultado){
        if (mysqli_num_rows($resultado) > 0) {
            mostrarResultadosEnTabla($resultado);
        } else {
            echo "No hay usuarios registrados";
        }
    } else {
        echo "ERROR: " . mysqli_error($conexion);
    }
}





if ($accion === 'create') {
    if (empty($nombre) || empty($correo)){
        echo "ERROR: Los campos Usuario y Correo son obligatorios";
    }else {
        $edad = ($edad === '') ? NULL : (int)$edad;
        crearUsuario($conexion, $nombre, $correo, $edad);
    }
}
if ($accion === 'delete'){
    if (empty($nombre)){
        echo "ERROR: El campo Usuario es obligatorio";
    }else {
        eliminarUsuario($conexion, $nombre);
    }
}
if ($accion === 'select'){
    if (empty($nombre)){
        leerTodosUsuarios($conexion);
    } else {
        leer($conexion, $nombre);
    }
}
if ($accion === 'update'){
    if (empty($nombre)){
        echo "ERROR: El campo usuario es obligatorio";
    } else {
        actualizarUsuario($conexion, $nombre, $correo, $edad);
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

    <form action="procedimental.php" method="post">
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
// Cerrar conexión al final del script
mysqli_close($conexion);
?>