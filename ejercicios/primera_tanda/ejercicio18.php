<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
<?php

    $PESO_PELUCHES_ONZAS = 4;
    $PESO_COCHE_LIBRAS = 2;
    $FACTOR_CONVERSION_ONZAS_KG = 1 / 35.274;
    $FACTOR_CONVERSION_LIBRAS_KG = 1 / 2.205;
    $num_peluches = 35;
    $num_coches = 2;


    $peso_envio_peluches_onzas = $PESO_PELUCHES_ONZAS * $num_peluches;
    $peso_envio_coches_libras = $PESO_COCHE_LIBRAS * $num_coches;

    $peso_envio_peluches_kg = $peso_envio_peluches_onzas * $FACTOR_CONVERSION_ONZAS_KG;
    $peso_envio_coches_kg = $peso_envio_coches_libras * $FACTOR_CONVERSION_LIBRAS_KG;
    $peso_total_kg = $peso_envio_coches_kg + $peso_envio_peluches_kg;

    echo "El peso total del paquete es de " . round($peso_total_kg, 2);

?>

    
</body>
</html>