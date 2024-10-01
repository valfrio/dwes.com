<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 15</title>
</head>
<body>
<?php

    $altura = 5.3;
    $peso = 1000;
    $icm = $peso / ($altura ** 2);
    printf("Con una altura de %a y un peso de %p, el imc es de %.2f", $altura, $peso, $icm);
?>

    
</body>
</html>