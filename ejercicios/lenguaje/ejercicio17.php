<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
<?php

    $celsius = 17.98;
    $kelvin = 273 + $celsius;
    $farenheit = $celsius * 9 / 5 + 32;

    echo "La temperatura de celsius es de $celsius, en kelvin es de " . round($kelvin, 2) . " en farenheit es "  . round($farenheit, 2);

?>

    
</body>
</html>