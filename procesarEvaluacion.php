<?php

$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$nombre = $_POST['nombre'];


$valido = false;


$patronCorreo = "/^[\w\-\.]+@([\w\-]+\.)+[a-zA-Z]{2,7}$/";;
if (preg_match($patronCorreo, $correo)) {
    $valido = true;
} else {
    echo "Email inválido <br>";
}


$patronTelf = "/^[0-9]{9,15}$/";
if (preg_match($patronTelf, $telefono)) {
    $valido = true;
} else {
    echo "telf inválido <br>";
}


$patronNombre = "/^[A-Za-z]\w{4,20}/";
if (preg_match($patronNombre, $nombre)) {
    $valido = true;
} else {
    echo "nombre inválido <br>";
}


if($valido == true){
    $texto_modificado = preg_replace("/$nombre/", strtoupper($nombre), $nombre);
    echo "<h1> Genial!!! Tu formulario no tiene errores. </h1><br>
    correo: {}
    telefono: {}
    nombre: {$texto_modificado} ";


}

?>