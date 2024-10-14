<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/inicio_y_fin.php');

inicio_html('Ejercicio 8', ['/styles/general.css']);

$array1 = [];
$array2 = [];
for($i = 1; $i <= 5000; $i++){
    $array1[] = random_int(1, 1000);
    $array2[] = random_int(1, 1000);
}




$coincidences = 0;
$arrays_length = count($array1);

for($i = 0; $i <= $arrays_length - 1; $i++){

    $array1_number = $array1[$i];
    $array2_number = $array2[$arrays_length - 1 - $i];

    if( $array1_number == $array2_number ){

        echo $coincidences . " $array1_number " . "$array2_number<br>";
        $coincidences++;

    }
}

echo "Total de coincidencias: " . $coincidences;

?>