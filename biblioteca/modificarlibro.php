<?php

include 'conexion.php'; 
$conn = conectar();

$mensaje = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $autor = mysqli_real_escape_string($conn, $_POST['autor']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $puntuacion = (int)$_POST['puntuacion']; // Convertir a entero
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);

 
    $sql_insert = "INSERT INTO libros (nombre, autor, isbn, puntuacion, genero) 
                   VALUES ('$nombre', '$autor', '$isbn', $puntuacion, '$genero')";

    if (mysqli_query($conn, $sql_insert)) {
        $mensaje = "<div class='mensaje-success'>¡Libro '{$nombre}' añadido correctamente!</div>";
      
        $nombre = $autor = $isbn = $genero = '';
        $puntuacion = 1;
    } else {
        $mensaje = "<div class='mensaje-error'>Error al añadir el libro: " . mysqli_error($conn) . "</div>";
    }
} else {
   
    $nombre = $autor = $isbn = $genero = '';
    $puntuacion = 1;
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nuevo Libro</title>
    <!-- --- PARTE CSS: Estilos del Formulario --- -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8; /* Fondo más claro y moderno */
            padding: 20px;
        }
        .contenedor {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #1e3a8a; /* Azul oscuro */
            border-bottom: 2px solid #bfdbfe;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #333;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="number"]:focus {
            border-color: #3b82f6; /* Azul brillante al enfocar */
            outline: none;
        }
        input[type="submit"] {
            background-color: #10b981; /* Verde esmeralda */
            color: white;
            padding: 14px 20px;
            margin-top: 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.1s;
        }
        input[type="submit"]:hover {
            background-color: #059669;
            transform: translateY(-1px);
        }
        .mensaje-success, .mensaje-error {
            margin-top: 10px;
            padding: 15px;
            text-align: center;
            border-radius: 6px;
            font-weight: bold;
        }
        .mensaje-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        .mensaje-error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        .volver {
            text-align: center; 
            margin-top: 25px;
        }
        .volver a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
        }
        .volver a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <h2>Añadir Nuevo Libro a la Biblioteca</h2>


    <?php echo $mensaje; ?>
    
  
    <form method="POST" action="IncluyeLibro.php">
        
        <label for="nombre">Nombre del Libro:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="<?php echo htmlspecialchars($autor); ?>" required>

        <label for="isbn">ISBN (opcional):</label>
        <input type="text" id="isbn" name="isbn" value="<?php echo htmlspecialchars($isbn); ?>">
        
        <label for="puntuacion">Puntuación (1-5):</label>
        <input type="number" id="puntuacion" name="puntuacion" min="1" max="5" value="<?php echo htmlspecialchars($puntuacion); ?>">

        <label for="genero">Género:</label>
        <input type="text" id="genero" name="genero" value="<?php echo htmlspecialchars($genero); ?>">

        <input type="submit" value="Añadir Libro">
    </form>
    
    <p class="volver"><a href="MostrarLibros.php">Volver al listado de libros</a></p>
</div>
</body>
</html>