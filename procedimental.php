<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


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
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "ID: " . $fila['id'] . "<br>";
                echo "Nombre: " . $fila['nombre'] . "<br>";
                echo "Email: " . $fila['email'] . "<br>";
                echo "Edad: " . $fila['edad'] . "<br>";
                echo "-------------------<br>";
            }
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
        echo "ERROR: El campo Usuario es obligatorio";
    } else {
        leer($conexion, $nombre);
    }
}

// Inicializamos mensaje vacío
// $mensaje = '';

// Si se envió el formulario
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $nombre = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
//     $correo = isset($_POST['email']) ? trim($_POST['email']) : '';
//     $edad = isset($_POST['edad']) && $_POST['edad'] !== '' ? (int)$_POST['edad'] : NULL;

//     if ($nombre === '' || $correo === '') {
//         $mensaje = "Por favor, completa todos los campos obligatorios (Usuario y Correo).";
//     } else {
//         // MEJORA: Usar consultas preparadas para prevenir SQL injection
//         $sql = "INSERT INTO usuarios (nombre, email, edad) VALUES (?, ?, ?)";
//         $stmt = mysqli_prepare($conexion, $sql);
        
//         if ($stmt) {
//             mysqli_stmt_bind_param($stmt, "ssi", $nombre, $correo, $edad);
            
//             if (mysqli_stmt_execute($stmt)) {
//                 $mensaje = "Nuevo registro creado exitosamente";
//                 // Limpiar los campos después de un registro exitoso
//                 $nombre = $correo = '';
//                 $edad = NULL;
//             } else {
//                 $mensaje = "Error: " . mysqli_error($conexion);
//             }
//             mysqli_stmt_close($stmt);
//         } else {
//             $mensaje = "Error al preparar la consulta: " . mysqli_error($conexion);
//         }
//     }
// }

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