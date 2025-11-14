<?php

include 'conexion.php';


if (empty($_POST['isbn_a_eliminar'])) {
    header("Location: MostrarLibros.php");
    exit;
}


$conn = conectar();


$isbn = $conn->real_escape_string($_POST['isbn_a_eliminar']);


if ($conn->query("DELETE FROM libros WHERE isbn='$isbn'")) {
  
    $msg = "Libro con ISBN $isbn eliminado correctamente.";
} else {
   
    $msg = "Error al eliminar el libro: " . $conn->error;
}


$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Libro</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #eee; text-align: center; }
        .container { max-width: 600px; margin: 50px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
        .mensaje { color: #333; }
        .volver { text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px; display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado de la Eliminación</h1>
        <p class="mensaje"><?php echo $msg; ?></p>
        <a class="volver" href="MostrarLibros.php">Volver a la Lista de Libros</a>
    </div>
</body>
</html>