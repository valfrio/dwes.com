<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
</head>
<body>
    
<?php
    
    $base = random_int(0,10);
    $exponente = random_int(0, 10);
    echo "La base y el exponente generados son $base y $exponente<br>";
    $resultado = 1;

    for( $i = 1; $i <= $exponente; $i++){
        $resultado *= $base;
    }

    echo "El resultado es $resultado";
    
?>

</body>
</html>