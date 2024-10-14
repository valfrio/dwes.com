<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 38</title>
</head>
<body>
    
<?php
    
    $cumple_condiciones = false;

    do{
        $num1 = random_int(1, 100);
        $num2 = mt_rand(1, 100);

        if( $num1 == $num2 ) continue;

        $num1_cuadrado = $num1 ** 2;
        $num2_cuadrado = $num2 ** 2;

        $num1_cubo = $num1 ** 3;
        $num2_cubo = $num2 ** 3;

        if( abs($num1 - $num2) <= 20){
                echo "El número 1 es $num1, su cuadrado es $num1_cuadrado y su cubo $num1_cubo<br>";
                echo "El número 2 es $num2, su cuadrado es $num2_cuadrado y su cubo $num2_cubo<br>";
                $cumple_condiciones = true;
            }

    }
    while( !$cumple_condiciones );
    

?>

</body>
</html>