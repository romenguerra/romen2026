<?php

$servidor = 'localhost';
$usuario = 'romen';
$contraseña = '230904';
$base_datos = 'gestion_usuarios';

$conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_datos);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}

// Inicializamos mensaje vacío
$mensaje = '';

// Si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $correo = isset($_POST['email']) ? trim($_POST['email']) : '';
    $edad = isset($_POST['edad']) && $_POST['edad'] !== '' ? (int)$_POST['edad'] : NULL;

    if ($nombre === '' || $correo === '') {
        $mensaje = "Por favor, completa todos los campos obligatorios (Usuario y Correo).";
    } else {
        // MEJORA: Usar consultas preparadas para prevenir SQL injection
        $sql = "INSERT INTO usuarios (nombre, email, edad) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssi", $nombre, $correo, $edad);
            
            if (mysqli_stmt_execute($stmt)) {
                $mensaje = "Nuevo registro creado exitosamente";
                // Limpiar los campos después de un registro exitoso
                $nombre = $correo = '';
                $edad = NULL;
            } else {
                $mensaje = "Error: " . mysqli_error($conexion);
            }
            mysqli_stmt_close($stmt);
        } else {
            $mensaje = "Error al preparar la consulta: " . mysqli_error($conexion);
        }
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
    <?php if ($mensaje !== ''): ?>
        <p style="color: <?php echo strpos($mensaje, 'exitosamente') !== false ? 'green' : 'red'; ?>">
            <?php echo htmlspecialchars($mensaje); ?>
        </p>
    <?php endif; ?>
    
    <form action="procedimental.php" method="post">
        <select name="accion" id="accion">
            <option value="create">Crear</option>
            <option value="select">Leer</option>
            <option value="update">Actualizar</option>
            <option value="delete">Eliminar</option>
        </select><br><br>

        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" id="usuario" value="<?php echo htmlspecialchars($nombre ?? ''); ?>">

        <label for="email">Correo: </label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($correo ?? ''); ?>">

        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad" value="<?php echo $edad ?? ''; ?>">

        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
// Cerrar conexión al final del script
mysqli_close($conexion);
?>