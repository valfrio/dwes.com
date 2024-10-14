<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 32</title>
</head>
<body>
    
<?php
    
    $NÚMERO = random_int(1, 10);
    echo "Tabla de multiplicar del $NÚMERO<br><br>";

    for($i = 1; $i <= 10; $i++){
        $resultado = $i * $NÚMERO;
        echo "$NÚMERO x $i = $resultado<br>"; 
    }  
    
?>

</body>
</html>