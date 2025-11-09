<?php

include 'recupera.php';


$rango = recupera();
$inicio_rango = $rango['inicio'];
$fin_rango = $rango['fin'];


echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Divisores con INCLUDE</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin: 20px auto; font-family: sans-serif; }
        th, td { border: 1px solid green; padding: 5px; text-align: center; }
        .header-col { background-color: #CCCCFF; }
        .header-row { background-color: #99CCFF; }
        .divisor { background-color: #FFFF99; font-weight: bold; }
        .no-divisor { background-color: #FFCC99; }
    </style>
</head>
<body>

<h1>Divisores del 50 al 60 con INCLUDE (Rango de ' . $inicio_rango . ' a ' . $fin_rango . ')</h1>
<table>
    <thead>
        <tr>
            <th class="header-row">Divisor</th>';


for ($num_divisor = 50; $num_divisor <= 60; $num_divisor++) {
    echo "<th class='header-col'>$num_divisor</th>";
}

echo '      </tr>
    </thead>
    <tbody>';


for ($divisor = $inicio_rango; $divisor <= $fin_rango; $divisor++) {
    echo "<tr>";
    echo "<th class='header-row'>$divisor</th>"; 

  
    for ($numero = 50; $numero <= 60; $numero++) {
        if ($numero % $divisor == 0) {
            $contenido = '*';
            $clase_fondo = 'divisor';
        } else {
            $contenido = '-';
            $clase_fondo = 'no-divisor';
        }
        
        echo "<td class='$clase_fondo'>$contenido</td>";
    }
    echo "</tr>";
}


echo '    </tbody>
</table>

</body>
</html>';
?>