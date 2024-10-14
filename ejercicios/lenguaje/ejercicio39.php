<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 38</title>
</head>
<body>
    
<?php
    
    $no_generado_100 = true;
    $suman_condicion = false;
    $total_generados = 0;
    $total_impares = 0;
    $sum_cuadrados = 0;

    while( $no_generado_100 xor $suman_condicion ){
        $num = random_int(1, 100);
        $num_cuadrado = $num ** 2;
        echo "El número generado es $num y su cuadrado es $num_cuadrado<br>";


        if( $num % 2 != 0 ) $total_impares++;

        $sum_cuadrados += $num_cuadrado;
        if($sum_cuadrados > 10000 && $sum_cuadrados < 11000) $suman_condicion = true;

        $total_generados++;
        if( $total_generados == 100 ) $no_generado_100 = false;
    }

    echo "La suma total de los cuadrados ha sido $sum_cuadrados<br>";
    echo "Se han generado $total_generados<br>";
    echo "El total de impares es de $total_impares";


    

?>

</body>
</html>