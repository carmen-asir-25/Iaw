<?php

// Variables de configuración
$servidor = "localhost";
$userBD = "root";      
$passwdBD = "root";     
$nomBD = "biblioteca";


function conectar_bd($servidor, $usuario, $clave, $base_de_datos) {
    $conexion = mysqli_connect($servidor, $usuario, $clave);

    if (!$conexion) {
        die("Error de Conexión al Servidor MySQL: " . mysqli_connect_error());
    }

    if (!$conexion->select_db($base_de_datos)) {
        die("Error: No se pudo seleccionar la BD '$base_de_datos'.");
    }
    
    $conexion->set_charset("utf8");

    return $conexion;
}
?>