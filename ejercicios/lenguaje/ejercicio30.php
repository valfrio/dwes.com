<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 24</title>
</head>
<body>
    
<?php
    
    $num1 = 7;
    $num2 = 4;
    $resultado = 0;

    for($i = 0; $i < $num2; $i++){
        $resultado += $num1;
    }

    echo "El resultado de $num1 x $num2 es $resultado";
    
?>

</body>
</html>