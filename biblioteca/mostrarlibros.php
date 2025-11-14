<?php

include 'conexion.php'; 


$conn = conectar();

$p = $_POST['puntuacion'] ?? '';
$sql = "SELECT nombre, autor, isbn, puntuacion, genero FROM libros";


if ($p !== '') {
 
    $p = $conn->real_escape_string($p);
    $sql .= " WHERE puntuacion = '$p'";
}


$sql .= " ORDER BY nombre ASC";


$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4: Biblioteca</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #eee; }
        .container { max-width: 900px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
        h1 { border-bottom: 2px solid #ccc; padding-bottom: 5px; }
   
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
        th { background-color: #e0e0e0; }
       
        .form-table { width: 100%; background: #ddd; border-radius: 4px; margin-bottom: 10px; }
        .form-table td { padding: 5px; }
        .form-table input[type="text"], .form-table select { width: 100%; box-sizing: border-box; padding: 5px; }
        .form-table input[type="submit"] { background-color: #5cb85c; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="container">

        <h1>Mostrar Libros</h1>

     
        <form method="POST" action="MostrarLibros.php">
            <table class="form-table" style="table-layout: fixed;">
                <tr>
                  
                    <td><input type="text" name="nombre" placeholder="Nom" disabled></td>
                   
                    <td><input type="text" name="autor" placeholder="Autor" disabled></td>
                 
                    <td><input type="text" name="isbn" placeholder="ISBN" disabled></td>
                 
                    <td>
                        <select name="puntuacion">
                            <option value="">Puntuació</option>
                            <?php 
                        
                            for ($i = 5; $i >= 1; $i--) {
                                $sel = ($p == $i) ? 'selected' : ''; // Preselecciona el valor buscado
                                echo "<option $sel value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </td>
                 
                    <td><input type="text" name="genero" placeholder="Gènere" disabled></td>
                  
                    <td style="width: 80px;"><input type="submit" value="Envia"></td>
                </tr>
            </table>
        </form>

        <h2>Resultados</h2>

        <?php
     
        if (!$result || $result->num_rows == 0) {
            echo "<p>No hay libros que coincidan con el criterio de búsqueda.</p>";
        } else {
            echo "<table>";
            echo "<thead><tr><th>Nombre</th><th>Autor</th><th>ISBN</th><th>Puntuación</th><th>Gènere</th></tr></thead>";
            echo "<tbody>";

       
            while ($fila = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['autor']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['isbn']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['puntuacion']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['genero']) . "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            echo "<p>Total de libros mostrados: " . $result->num_rows . "</p>";
        }

   
        $conn->close();
        ?>
    </div>
</body>
</html>