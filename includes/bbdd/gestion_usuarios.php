<?php

function crearUsuario($nombre, $correo, $edad) {

    $query = new Query("INSERT INTO usuarios (nombre, email, edad) VALUES ('$nombre', '$correo', '$edad')");

    if ($query->total >0){
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error al crear el registro";
    }
}

function leerUsuarios($nombre) {
    $query = new Query("SELECT * FROM usuarios WHERE nombre = '$nombre'");

    if ($query->total > 0){
        mostrarResultadosEnTabla($query);
    } else {
        echo "No se encontró ningun usuario con ese nombre";
    }

}


function eliminarUsuario($nombre) {

    $query = new Query("DELETE FROM usuarios WHERE nombre = '$nombre'");

    if ($query->total >0){
        echo "Registro borrado exitosamente";
    } else {
        echo "Error al eliminar el registro";
    }

}

function actualizarUsuarios($nombre, $correo, $edad){
    $query = new Query("UPDATE usuarios
            SET nombre = '$nombre', email = '$correo', edad = '$edad'
            WHERE nombre = '$nombre'");


    if ($query->total >0){
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error al eliminar el registro";
    }
}

function mostrarResultadosEnTabla($query) {
    echo "<h3>Resultados:</h3>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
    echo "<thead>";
    echo "<tr style='background-color: #f2f2f2;'>";
    echo "<th style='padding: 8px; text-align: left;'>ID</th>";
    echo "<th style='padding: 8px; text-align: left;'>Nombre</th>";
    echo "<th style='padding: 8px; text-align: left;'>Email</th>";
    echo "<th style='padding: 8px; text-align: left;'>Edad</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($fila = $query->recuperar()) {
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


?>