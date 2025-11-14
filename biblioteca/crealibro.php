<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "Acceso no permitido.";
    exit;
}

$conn = conectar();
if (!$conn) {
    echo "Error al conectar.";
    exit;
}

$isbn   = $conn->real_escape_string($_POST['isbn'] ?? '');
$titulo = $conn->real_escape_string($_POST['titulo'] ?? '');
$autor  = $conn->real_escape_string($_POST['autor'] ?? '');

// Comprobar si el ISBN ya existe
$existe = $conn->query("SELECT isbn FROM libros WHERE isbn = '$isbn'");
if ($existe && $existe->num_rows > 0) {
    echo "El libro ya existe.";
} else {
    $conn->query("INSERT INTO libros (nombre, autor, isbn, puntuacion, genero)
                  VALUES ('$titulo', '$autor', '$isbn', 0, 'No especificado')");
    echo "Libro creado correctamente.";
}

$conn->close();

echo '<br><a href="FormLibros.html">Volver</a>';
?>
