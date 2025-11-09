<?php
$inicio_rango = 1;
$fin_rango = 10;


echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Divisores (50-60)</title>
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

<h1>Divisores de números del 50 al 60 (Rango de 1 a 10)</h1>
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