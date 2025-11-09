<?php

function recupera() {
 
    $inicio = isset($_POST['num_inicio']) ? (int)$_POST['num_inicio'] : 1;
    $fin = isset($_POST['num_fin']) ? (int)$_POST['num_fin'] : 10;
    
  
    if ($inicio < 1) $inicio = 1;
    if ($fin > 20) $fin = 20;
    if ($inicio > $fin) {
        $inicio = 1;
        $fin = 10;
    }

    return ['inicio' => $inicio, 'fin' => $fin];
}
?>