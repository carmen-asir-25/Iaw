<?php

define("HOST", "localhost"); 
define("USUARIO", "root");
define("PASSWORD", "1234");
define("BD", "biblioteca");

function conectar() {
  
    $conn = new mysqli(HOST, USUARIO, PASSWORD, BD);

    
    if ($conn->connect_error) {
       
        die("Error de conexión: " . $conn->connect_error);
    }
    
    $conn->set_charset("utf8");
    
    return $conn;
}

?>