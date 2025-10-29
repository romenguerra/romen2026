<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "includes/general.php";
require "includes/bbdd/bbdd.php";
require "includes/bbdd/query.php";

// Procesar el formulario
$accion = $_POST['accion'] ?? '';
$nombre = $_POST['usuario'] ?? '';
$correo = $_POST['email'] ?? '';
$edad = $_POST['edad'] ?? '';

echo Template::header('Biblioteca');
echo Template::nav();
?>

<!--[if lte IE 9]>
    <p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
    </p>
<![endif]-->

<!-- Preloader -->
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /End Preloader -->

<!-- GESTIÓN DE USUARIOS -->
<div class="container" style="margin-top: 50px; padding: 20px;">
    <h2>Gestión de Usuarios</h2>
    <form method="post">
        <select name="accion" id="accion">
            <option value="create">Crear</option>
            <option value="select">Leer</option>
            <option value="update">Actualizar</option>
            <option value="delete">Eliminar</option>
        </select><br><br>

        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario" id="usuario" value="<?= htmlspecialchars($nombre) ?>">

        <label for="email">Correo: </label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($correo) ?>">

        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad" value="<?= htmlspecialchars($edad) ?>">

        <br><br>
        <button type="submit">Enviar</button>
    </form>

    <!-- RESULTADOS -->
    <div style="margin-top: 20px;">
        <?php
        // Incluir funciones de gestión de usuarios
        require "includes/bbdd/gestion_usuarios.php";
        
        // Procesar acciones
        if ($accion === 'create') {
            if (empty($nombre) || empty($correo)) {
                echo "<div style='color: red;'>ERROR: Los campos Usuario y Correo son obligatorios</div>";
            } else {
                $edad = ($edad === '') ? 'NULL' : $edad;
                crearUsuario($nombre, $correo, $edad);
            }
        }

        if ($accion === 'delete') {
            if (empty($nombre)) {
                echo "<div style='color: red;'>ERROR: El campo Usuario es obligatorio</div>";
            } else {
                eliminarUsuario($nombre);
            }
        }

        if ($accion === 'select') {
            if (empty($nombre)) {
                echo "<div style='color: red;'>ERROR: El campo Usuario es obligatorio</div>";
            } else {
                leerUsuarios($nombre);
            }
        }

        if ($accion === 'update') {
            if (empty($nombre) || empty($correo)) {
                echo "<div style='color: red;'>ERROR: Los campos Usuario y Correo son obligatorios</div>";
            } else {
                $edad = ($edad === '') ? 'NULL' : $edad;
                actualizarUsuarios($nombre, $correo, $edad);
            }
        }
        ?>
    </div>
</div>

<!-- ... el resto de tu HTML ... -->

<?php echo Template::footer(); ?>