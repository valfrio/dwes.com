<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16</title>
</head>
<body>
<?php

$CAMBIO_EUROS_DOLARES = 1.1;
$CAMBIO_EUROS_LIRBAS = 0.84;
$euros = 17.98;
$dolares = $CAMBIO_EUROS_DOLARES * $euros;
$libras = $CAMBIO_EUROS_LIRBAS * $euros;

echo "El dinero en euros es de $euros, que en dolres es " . round($dolares, 2) . " y en libras es "  . round($libras, 2);

?>

    
</body>
</html>