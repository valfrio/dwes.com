<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
</head>
<body>
    
<?php
    
    $DIVIDENDO = 5;
    $contador = $DIVIDENDO;
    $DIVISOR = 4;
    $cociente = 0;
    $resto = 0;

    while( $contador >= $DIVISOR ){
        $contador -= $DIVISOR;
        $cociente++;
    }

    $resto = $contador;
    

    echo "El resultado de $DIVIDENDO / $DIVISOR es $cociente y el resto es $resto";
    
?>

</body>
</html>