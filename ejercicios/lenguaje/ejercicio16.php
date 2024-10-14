<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
<?php

    $num1 = 7;
    $num2 = 4;

    $cociente = round( $num1 / $num2, 0, $mode = PHP_ROUND_HALF_DOWN);

    echo "$num1 dividido por $num2 de como resultado un cociente de $cociente y el resto es " . $num1 % $num2;
?>

    
</body>
</html>