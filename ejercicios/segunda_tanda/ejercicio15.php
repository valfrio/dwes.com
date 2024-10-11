<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejercicio 8', ['/styles/general.css']);

$num= [];
for($i = 1; $i <= 20000; $i++){
    $array1[] = random_int(1, 100);

    // for($j = 1; $j <= 20; $j++){


    // }
}

$num_buscado = random_int(1, 100);

$clave_num_buscado = array_search($num_buscado, $num);

if ($clave_num_buscado == false ){
    echo "No se encontró :(";
}
else{
    echo "La clave es $clave_num_buscado, el número generado es $num_buscado
          y el número en la posición de la clave es {$num[$clave_num_buscado]}}";
}

?>