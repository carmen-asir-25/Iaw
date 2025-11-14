<?php
include 'conexion.php';
$conn = conectar();

$mensaje = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_libro'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $isbn = $_POST['isbn'];
    $puntuacion = $_POST['puntuacion'];
    $genero = $_POST['genero'];

    $sql = "UPDATE libros SET 
            nombre='$nombre', autor='$autor', isbn='$isbn',
            puntuacion=$puntuacion, genero='$genero'
            WHERE id_libro=$id";

    $mensaje = mysqli_query($conn, $sql) ? 
               "Libro modificado." : "Error al modificar.";
}


$id = $_GET['id'] ?? ($_POST['id_libro'] ?? null);
$datos_libro = [];

if ($id) {
    $res = mysqli_query($conn, "SELECT * FROM libros WHERE id_libro=$id");
    if ($res && mysqli_num_rows($res) == 1) {
        $datos_libro = mysqli_fetch_assoc($res);
    } else {
        $mensaje = "Libro no encontrado.";
    }
}

mysqli_close($conn);

?>
