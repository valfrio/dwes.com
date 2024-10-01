<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
<?php
    
    $numero_octal = 01735;
    $numero_hexadecimal = 0x3DD;
    $numero_binario = 0b1111011101;

    echo "El numero $numero_octal en octal es: ". decoct($numero_octal) . "<br>";
    echo "El numero $numero_hexadecimal en hexadecimal es: ". dechex($numero_hexadecimal) . "<br>";
    echo "El numero $numero_binario en binario es: ". decbin($numero_binario) . "<br>";
    
?>
    
</body>
</html>