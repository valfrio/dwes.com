<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/inicio_y_fin.php");

inicio_html("Ejercicio 3", 
        ["/styles/general.css"]);

$array = [];
$FILAS = 50;
$COLUMNAS = 50;



echo "<table border='1'>";

for($i = 0; $i < $FILAS; $i++){

    $total_fila = 0;
    echo "<tr>";
    for($j = 0; $j < $COLUMNAS; $j++){

        $array[$i][$j] = random_int(1, 100);
        echo "<td>" . $array[$i][$j] . "</td>";
        $total_fila += $array[$i][$j];

    }
    echo "<td>El total de la fila es $total_fila</td>";
    echo "</tr>";

}

echo "</table>";

fin_html();

{

}
?>