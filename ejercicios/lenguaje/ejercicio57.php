<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 38</title>
</head>
<body>

<?php

    $longitud = random_int(1, 15);
    $cadena = "";

    for($i = 0; $i <= $longitud; $i++){
        $codigo_ascii = random_int(0, 255); 
        $cadena .= chr($codigo_ascii); // Hay carácteres que son de control, no visibles
    }

    $cadena_array = str_split($cadena);
    foreach( $cadena_array as $carácter ){
        echo "$carácter<br>";
    }
?>

</body>
</html>