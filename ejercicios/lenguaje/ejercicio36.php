<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 36</title>
</head>
<body>
    
<?php
    
    $NUM_VECES = 15;
    for($i = 0; $i < $NUM_VECES; $i++){
        $num = random_int(1, 100);

        if( $num % 2 == 0 ) echo "El número generado es $num y es divisible por 2<br>";
        else if( $num % 3 == 0 ) echo "El número generado es $num y es divisible por 3<br>";
        else echo "El número generado es $num y no es divisible por 2 o 3<br>";

    }
?>

</body>
</html>