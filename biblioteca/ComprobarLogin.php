<?php

session_start();
require 'cabecera.php';


$usuario = $_POST['usuario'];
$clave_formulario = $_POST['clave']; 


$clave_encriptada = md5($clave_formulario);


$con = conectar_bd($servidor, $userBD, $passwdBD, $nomBD);


$consulta = "SELECT id, nombre, tipo FROM usuarios WHERE nombre='" . $usuario . "' AND clave='" . $clave_encriptada . "'";


$resultado = mysqli_query($con, $consulta);


if (mysqli_num_rows($resultado) == 1) {

    $fila = mysqli_fetch_assoc($resultado);
    
    $_SESSION['usuario_id'] = $fila['id'];
    $_SESSION['usuario_nombre'] = $fila['nombre'];
    $_SESSION['usuario_tipo'] = $fila['tipo'];


    header('Location: MostrarLibros.php');
    exit;

} else {

    header('Location: login.html?error=1');
    exit;
}

mysqli_close($con); 
?>