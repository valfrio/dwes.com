<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
<?php


    $CAMBIO_GRAMOS_LIBRAS = 1 / 453.5923699993531;
    $PESO_ADULTOS_KG = 75;
    $PESO_CRIOS_KG = 20;
    $PESOMAX_GLOBO_LIBRAS = 1000;
    $num_adultos = 2;
    $num_crios = 3;

    // Un kilo son 1000 gramos
    $peso_total_personas_kg = ($PESO_ADULTOS_KG * $num_adultos + $PESO_CRIOS_KG * $num_crios)  * 1000;
    $peso_total_personas_libras = $peso_total_personas_kg * $CAMBIO_GRAMOS_LIBRAS;
    echo $peso_total_personas_libras < $PESOMAX_GLOBO_LIBRAS ? "Pueden ir en un solo viaje" : "Deben separarse en dos grupos";

?>

    
</body>
</html>